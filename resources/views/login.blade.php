<x-layout>
<x-slot:title>Кофеманы - авторизация</x-slot:title>

<section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Авторизация</h2>

        <form action="{{route('auth.login')}}" class="grid gap-y-4" method="post">
        @csrf
            <div class="grid grid-cols-2 items-center gap-y-1">
                <label for="login" class="text-xl">Логин</label>
                <input type="text" id="login" name="login" class="bg-blue-100 rounded py-2 px-2">
                @error('login')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <div class="grid grid-cols-2 items-center">
                <label for="password" class="text-xl">Пароль</label>
                <input type="password" id="password" name="password" class="bg-blue-100 rounded py-2 px-2">
                @error('password')
                <span class="text-red-400">{{$message}}</span>
                @enderror
            </div>
            <button type="submit" class="bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Войти</button>
        </form>

        <a href="{{route('home')}}" class="text-center hover:text-orange-600 transition">Вернуться на главную</a>    
    </div>
</section>

</x-layout>