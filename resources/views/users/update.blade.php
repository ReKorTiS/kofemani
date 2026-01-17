<x-layout>
<x-slot:title>Кофеманы - редактирование пользователя</x-slot:title>

<section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Редактирование пользователя</h2>

        <form action="{{route('user.update')}}" class="grid gap-y-4" method="post">
            @method('patch')
        @csrf
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="lastname" class="text-xl">Фамилия:</label>
                <input type="text" id="lastname" name="lastname" class="bg-blue-100 rounded py-2 px-2" value="{{$thisuser->lastname}}">
                @error('lastname')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="firstname" class="text-xl">Имя:</label>
                <input type="text" id="firstname" name="firstname" class="bg-blue-100 rounded py-2 px-2" value="{{$thisuser->firstname}}">
                @error('firstname')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="patronymic" class="text-xl">Отчество:</label>
                <input type="text" id="patronymic" name="patronymic" class="bg-blue-100 rounded py-2 px-2" value="{{$thisuser->patronymic}}">
                @error('patronymic')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="login" class="text-xl">Логин:</label>
                <input type="text" id="login" name="login" class="bg-blue-100 rounded py-2 px-2" value="{{$thisuser->login}}">
                @error('login')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="is_admin" class="text-xl">Администратор:</label>
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" id="is_admin" name="is_admin" value="1" class="bg-blue-100 rounded py-2 px-2">
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="password" class="text-xl">Пароль:</label>
                <input type="password" id="password" name="password" class="bg-blue-100 rounded py-2 px-2">
            </div>
            <button type="submit" class="bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Сохранить отредактированное</button>
        </form>
        <a href="{{route('users.index')}}" class="text-center hover:text-orange-600 transition">Вернуться обратно</a>    
    </div>
</section>

</x-layout>