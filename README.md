<!-- Наши маршруты/web.php выглядят так: -->

Route::get('/', 'ImportController@getImport')->name('import');
Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
Route::post('/import_process', 'ImportController@processImport')->name('import_process');
<!-- Итак, три действия: импорт формы, экранизация полей и обработка с успехом (или нет). -->

<!-- Первый выглядит очень просто: -->

class ImportController extends Controller
{

    public function getImport()
    {
        return view('import');
    }
<!-- Вот и всё, никаких данных для передачи в вид, больше никакой логики. Теперь. -->

<!-- Шаг дальше — давайте действительно разберём наш CSV. -->
<!-- Я покажу вам метод шаг за шагом. -->

public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    // To be continued...
}
<!-- <!-- Первая часть — фактически получить файл CSV, это короткая реплика в Laravel. Вместе с этим появляется файл запроса на валидацию, который тоже довольно прост — нам просто нужно убедиться, что CSV загружен: --> -->

class CsvImportRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'csv_file' => 'required|file'
        ];
    }
}
<!-- Далее — как анализировать данные. У нас будет два сценария — с заголовком или без него.

Парсинг CSV без заголовочной строки
Давайте сначала разберёмся без заголовка. Представьте, что у нас есть этот CSV: -->


<!-- 
Тогда разбор CSV в массив — это тоже короткая фраза. -->

public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    // To be continued...
}
<!-- Таким образом, у нас будет $data массив строк, где каждая строка будет содержать массив столбцов. Теперь мы можем представить is в виде таблицы и дать пользователю выбор полей. -->

public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));
    $csv_data = array_slice($data, 0, 2);
    return view('import_fields', compact('csv_data'));
}
<!-- Я делаю срез только первых двух строк, потому что их достаточно для отображения, чтобы пользователь понимал, какое значение в каком столбце. Не нужно показывать весь CSV. -->

<!-- А теперь вот как выглядит наш import_fields.blade.php: -->

<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
    {{ csrf_field() }}

    <table class="table">
        @foreach ($csv_data as $row)
            <tr>
            @foreach ($row as $key => $value)
                <td>{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        <tr>
            @foreach ($csv_data[0] as $key => $value)
                <td>
                    <select name="fields[{{ $key }}]">
                        @foreach (config('app.db_fields') as $db_field)
                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
    </table>

    <button type="submit" class="btn btn-primary">
        Import Data
    </button>
</form>
<!-- А вот у нас есть что-то вроде этого — тот же скриншот, что и выше:


<!-- 
Несколько комментариев здесь. Как видно, у нас есть другая форма, которая показывает таблицу первых двух строк CSV, а затем одну строку с выпадающим списком для каждого столбца.

Для простоты мы сохраняем опции для столбцов в виде массивов в config/app.php: --> -->

'db_fields' => [
    'first_name',
    'last_name',
    'email'
]
<!-- Поэтому мы вызываем их как config('app.db_fields') и проходим через них.

Также мы используем структуру $loop->индекса для установки значения поля. Подробнее о The Loop Variable можно прочитать здесь.

Временное сохранение данных
Теперь, чтобы затем обработать данные, нам нужно где-то их хранить — помните, в таблице мы показываем только две первые строки.

Есть разные способы сделать это, я выбрал отдельную таблицу базы данных для CSV-файлов: -->

Schema::create('csv_data', function (Blueprint $table) {
    $table->increments('id');
    $table->string('csv_filename');
    $table->boolean('csv_header')->default(0);
    $table->longText('csv_data');
    $table->timestamps();
});
<!-- И простая модель-приложение/CsvData.php: -->

class CsvData extends Model
{
    protected $table = 'csv_data';
    protected $fillable = ['csv_filename', 'csv_header', 'csv_data'];
}
<!-- Если мы вернёмся к контроллеру, нам нужно хранить полные данные в этой таблице — вот как это будет выглядеть сейчас: -->

public function parseImport(CsvImportRequest $request)
{
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'csv_data' => json_encode($data)
    ]);

    $csv_data = array_slice($data, 0, 2);
    return view('import_fields', compact('csv_data', 'csv_data_file'));
}
<!-- Мы сохраняем данные файла в базе данных с помощью json_encode(), и передаём результат в представление. Затем, в нашей форме import_fields.blade.php, мы показываем, какой файл хотим обработать, указывая его ID как скрытое поле. -->

<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
    {{ csrf_field() }}
    <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />
<!-- Теперь пришло время действительно обработать данные.

Хранение данных в базе данных
На самом деле, эта часть тоже довольно проста — нужно просто сопоставить значения выпадающего списка с реальными значениями столбцов. Вот как это выглядит: -->

public function processImport(Request $request)
{
    $data = CsvData::find($request->csv_data_file_id);
    $csv_data = json_decode($data->csv_data, true);
    foreach ($csv_data as $row) {
        $contact = new Contact();
        foreach (config('app.db_fields') as $index => $field) {
            $contact->$field = $row[$request->fields[$index]];
        }
        $contact->save();
    }

    return view('import_success');
}
<!-- Мы получаем данные из базы данных, делаем json_decode() (второй параметр true даёт результат массива), а затем просматриваем их по циклу.

Самая сложная часть, пожалуй, — вот эта фраза: -->

$contact->$field = $row[$request->fields[$index]];
<!-- Здесь мы присваиваем значение свойству согласно выпадающему списку из таблицы полей.

Вот и всё — посмотрите на успех! -->