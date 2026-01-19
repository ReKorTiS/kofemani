<x-layout>
<x-slot:title>Кофеманы - редактирование пользователя</x-slot:title>

<section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Редактирование пользователя</h2>

        <form action="{{route('user.update', $user )}}" class="grid gap-y-4" method="post">
            @method('patch')
        @csrf
            <div class="grid grid-cols-2 items-center">
                <label for="lastname" class="text-xl">Фамилия:</label>
                <input type="text" id="lastname" name="lastname" class="bg-blue-100 rounded py-2 px-2" value="{{$user->lastname}}">
                @error('lastname')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="firstname" class="text-xl">Имя:</label>
                <input type="text" id="firstname" name="firstname" class="bg-blue-100 rounded py-2 px-2" value="{{$user->firstname}}">
                @error('firstname')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="patronymic" class="text-xl">Отчество:</label>
                <input type="text" id="patronymic" name="patronymic" class="bg-blue-100 rounded py-2 px-2" value="{{$user->patronymic}}">
                @error('patronymic')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="login" class="text-xl">Логин:</label>
                <input type="text" id="login" name="login" class="bg-blue-100 rounded py-2 px-2" value="{{$user->login}}">
                @error('login')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            @if($user->id !== Auth::user()->id)
            <div class="grid grid-cols-2 items-center">
                <span class="text-xl">Тип аккаунта:</span>
                <div class="">
                    @if($user->is_admin == '0')
                    <label for="manager" class="flex gap-x-1"><input type="radio" id="manager" name="is_admin" value="0" checked>Менеджер</label>
                    <label for="admin" class="flex gap-x-1"><input type="radio" id="admin" name="is_admin" value="1" class="bg-blue-100 rounded py-2 px-2" >Администратор</label>       
                    @else
                    <label for="manager" class="flex gap-x-1"><input type="radio" id="manager" name="is_admin" value="0">Менеджер</label>
                    <label for="admin" class="flex gap-x-1"><input type="radio" id="admin" name="is_admin" value="1" class="bg-blue-100 rounded py-2 px-2" checked>Администратор</label>
                    @endif               
                </div>

            </div>
            @endif
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