<x-layout>
    <x-slot:title>Кофеманы - товары</x-slot:title>
    <section class="grid py-8 justify-center">
    <div class="grid border p-4 rounded ">
        <h2 class="text-center text-3xl font-medium pb-4">Товары</h2>
            <ul class="grid grid-cols-5 bg-orange-100 p-3 text-xl font-medium gap-x-4">
                <li>Наименование товара</li>
                <li>Производитель товара</li>
                <li>Стоимость товара</li>
                <li>Единица измерения</li>
                <li class="text-center">Управление</li>
            </ul>
                @foreach($products as $product)
            <ul class="grid grid-cols-5 odd:bg-gray-100 p-3 hover:bg-gray-200 gap">
                    <li>{{$product->name}}</li>
                    <li>{{$product->producer}}</li>
                    <li>{{$product->price}}</li>
                    <li>{{$product->unit}}</li>
                    <li>
                        <div class="grid grid-cols-2 gap-x-2">
                            <a href="{{route('product.updatepage', $product)}}" class="bg-orange-950 px-2 rounded border border-orange-950 text-white hover:text-black hover:bg-white transition text-center">Редактировать</a>
                            <form action="{{route('product.delete', $product)}}" method="post" class="grid">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="bg-red-600 px-2 rounded text-white hover:text-black hover:bg-white transition cursor-pointer text-center">Удалить</button>                            
                            </form>                        


                        </div>
                    </li>
                </ul>
            @endforeach
            <div class="pb-2 py-6 flex gap-x-2 justify-center">
                <a href="{{route('product.storepage')}}" class="text-center  bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Добавить товар</a>
                <form action="{{ route('product.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="csv_file" id="csv_file" class="rounded">
                    <button type="submit" class="text-center bg-blue-700 text-white cursor-pointer hover:text-black hover:bg-white border border-blue-700 p-2 rounded transition">
                        Добавить товары из CSV
                    </button>
                    @error('csv_file')
                    <span class="text-red-400">{{$message}}</span>
                    @enderror
                </form>
            </div>
        </div>
    </section>
</x-layout>