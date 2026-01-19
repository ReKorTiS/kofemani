<x-layout>
<x-slot:title>Кофеманы - редактирование товара</x-slot:title>

<section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Редактирование товара</h2>

        <form action="{{route('product.update', $product)}}" class="grid gap-y-4" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span  class="text-xl">Наименование товара:</span>
                <p class=" py-2 px-2">{{$product->name}}</p>

            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="producer" class="text-xl">Производитель:</label>
                <input type="text" id="producer" name="producer" class="bg-blue-100 rounded py-2 px-2" value="{{$product->producer}}">
                @error('producer')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="image" class="text-xl">Фотография:</label>
                <input type="file" id="image" name="image" class="bg-blue-100 rounded py-2 px-2">
                @error('image')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>            
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="price" class="text-xl">Стоимость товара:</label>
                <input type="number" id="price" name="price" class="bg-blue-100 rounded py-2 px-2" value="{{$product->price}}">
                @error('price')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Единица измерений:</span>
                <p class="py-2 px-2">{{$product->unit}}</p>
                @error('unit')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="shortDescription" class="text-xl">Краткое описание товара:</label>
                <input type="text" id="shortDescription" name="shortDescription" class="bg-blue-100 rounded py-2 px-2" value="{{$product->shortDescription}}">
                @error('shortDescription')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>            
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="description" class="text-xl">Описание товара:</label>
                <input type="text" id="description" name="description" class="bg-blue-100 rounded py-2 px-2" value="{{$product->description}}">
                @error('description')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>            
            <button type="submit" class="bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Добавить товар</button>
        </form>
        <a href="{{route('products.index')}}" class="text-center hover:text-orange-600 transition">Вернуться обратно</a>    
    </div>
</section>

</x-layout>