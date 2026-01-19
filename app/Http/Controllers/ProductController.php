<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index', compact('products'));
    }    
// Редактирование
    public function productUpdatePage(Product $product){
        return view('products.update', compact('product'));
    }

    public function productUpdate(Request $request, Product $product){
        $credentials = $request->validate([
            'producer' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg|max:2048',
            'price' => 'required',
            'shortDescription' => 'required',
            'description' => 'required', 
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
    
            $newPath = $request->file('image')->store('images', ['disk' => 'public']);
            $credentials['image'] = $newPath;
        }
    
        $product->update($credentials);
    
        session()->flash('yes', 'Товар успешно обновлён!');
        return to_route('products.index');
    }
// Добавление
    public function productStorePage(Product $product){
        return view('products.store');
    }
    public function productStore(Request $request, Product $product){
        $credentials = $request->validate([
                        'name' => 'required',
                        'producer' => 'required',
                        'image' => 'nullable|file|mimes:jpg,jpeg|max:2048',
                        'price' => 'required',
                        'unit' => 'required',
                        'shortDescription' => 'required',
                        'description' => 'required', 
        ]);
        if($credentials){
            if($request->hasFile('image')){
                 $path = $request->file('image')->store('images', ['disk' => 'public']);               
            }
        $credentials['image'] = $path;
        Product::create($credentials);  
        session()->flash('yes', 'Товар успешно добавлен!');
            return to_route('products.index');       
        }    
        session()->flash('no', 'Что-то пошло не так');
        return back();  
        }
// Импорт из CSV
public function productImport(Request $request)
{
    $credentials = $request->validate([
        'csv_file' => 'required|file|mimes:csv,txt',
    ]);

    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    unset($data[0]); 

    foreach ($data as $row) {

        $product = new Product();

        $product->name = trim($row[0]);      
        $product->producer = trim($row[1]);     
        $product->image = trim($row[2]);     
        $product->price = floatval(trim($row[3])); 
        $product->unit = trim($row[4]);   
        $product->shortDescription = trim($row[5]);  
        $product->description = trim($row[6]);    

        $product->save();
    }
    session()->flash('yes', 'Данные успешно импортированы!');
    return redirect()->route('products.index');
            
        }
// Удаление
    public function productDelete(Product $product){    

        session()->flash('ok', 'Товар успешно удалён!');
        $product->delete();
    
    
        return to_route('products.index'); 
        }
    }


