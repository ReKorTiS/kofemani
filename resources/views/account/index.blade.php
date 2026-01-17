<x-layout>
    <x-slot:title>Кофеманы - аккаунт</x-slot:title>
    <section class="grid h-full w-full items-center justify-center">
    <div class="grid border p-4 gap-y-4 rounded">
        <h2 class="text-center text-3xl font-medium">Аккаунт</h2>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Имя:</span>
                <p class="p-2 text-xl">{{Auth::user()->firstname}}</p>
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Фамилия:</span>
                <p class="p-2 text-xl">{{Auth::user()->lastname}}</p>
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Отчество:</span>
                <p class="p-2 text-xl">{{Auth::user()->patronymic}}</p>
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Email:</span>
                <p class="p-2 text-xl">{{Auth::user()->email}}</p>
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Логин:</span>
                <p class="p-2 text-xl">{{Auth::user()->login}}</p>
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Тип акаунта:</span>
                <p class="p-2 text-xl">
                    @if(Auth::user()->is_admin == '1')
                        Администратор
                    @else
                        Менеджер
                    @endif
                </p>
            </div>
            <form action="{{route('account.changepassword')}}" class="grid gap-y-4" method="post">
                @method('PATCH')
                @csrf
            <h2 class="text-center text-2xl font-medium">Смена пароля</h2>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Текущий пароль</span>
                <input type="password" name="old_password" class="bg-blue-100 rounded p-2">
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Новый пароль</span>
                <input type="password" name="password" class="bg-blue-100 rounded p-2">
            </div>
            <div class="grid grid-cols-2 items-center gap-y-1">
                <span class="text-xl">Повторите пароль</span>
                <input type="password" name="password_confirmation" class="bg-blue-100 rounded p-2">
            </div>
            <button type="submit" class="bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Сменить пароль</button>
        </form>
        <a href="{{route('home')}}" class="text-center hover:text-orange-600 transition">Вернуться на главную</a>  
    </div>
</section>
</x-layout>