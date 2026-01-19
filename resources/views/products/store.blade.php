<x-layout>
<x-slot:title>Кофеманы - добавление товара</x-slot:title>

<section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Добавление товара</h2>

        <form action="{{route('product.store')}}" class="grid gap-y-4" method="post" enctype="multipart/form-data">

        @csrf
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="name" class="text-xl">Наименование товара:</label>
                <input type="text" id="name" name="name" class="bg-blue-100 rounded py-2 px-2">
                @error('name')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="producer" class="text-xl">Производитель:</label>
                <input type="text" id="producer" name="producer" class="bg-blue-100 rounded py-2 px-2">
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
                <input type="number" id="price" name="price" class="bg-blue-100 rounded py-2 px-2">
                @error('price')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="unit" class="text-xl">Единица измерений:</label>
                    <select name="unit" id="unit" class="rounded py-2 px-2 bg-blue-100">
                        @foreach(['кг.', 'шт.', 'гр.', 'л.', 'мл.'] as $unit)
                            <option value="{{$unit}}">{{$unit}}</option>
                        @endforeach
                    </select>
                @error('unit')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="shortDescription" class="text-xl">Краткое описание товара:</label>
                <input type="text" id="shortDescription" name="shortDescription" class="bg-blue-100 rounded py-2 px-2">
                @error('shortDescription')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>            
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="description" class="text-xl">Описание товара:</label>
                <input type="text" id="description" name="description" class="bg-blue-100 rounded py-2 px-2">
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