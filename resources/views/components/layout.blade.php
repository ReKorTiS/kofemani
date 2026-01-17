<script src="{{asset('tailwindcss/tailwindcss.js')}}"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
</head>
<body class="flex flex-col h-full">
    @session('yes')
    <div class="w-full p-1 bg-green-500 text-xl text-center font-medium">
        {{$value}}
    </div>
    @endsession
    @session('no')
    <div class="w-full p-1 bg-red-500 text-xl text-center font-medium">
        {{$value}}
    </div>
    @endsession
    <header class="flex w-full px-8 py-2 items-center bg-orange-100 font-medium">
        <a href="{{route('home')}}" class="flex gap-x-4 items-center">
            <div>
                <img src="{{asset('images/logo.svg')}}" alt="" class="h-[40px] w-[40px]">                
            </div>
            <h1 class="text-2xl">Кофеманы</h1>
        </a>
        <nav class="flex flex-grow gap-x-8 justify-center">
            @auth
            @if(Auth::user()->is_admin == '1')
            <a href="{{route('users.index')}}" class="hover:text-orange-600 transition">Пользователи</a>
            <a href="{{route('products.index')}}" class="hover:text-orange-600 transition">Товары</a>
            @endif
            <a href="{{route('clients.index')}}" class="hover:text-orange-600 transition">Клиенты</a>
            <a href="{{route('orders.index')}}" class="hover:text-orange-600 transition">Заказы</a>
            @endauth
        </nav>
        @guest
            <a href="{{route('login')}}" class="bg-orange-950 px-2 rounded border border-orange-950 text-white hover:text-black hover:bg-white transition">Авторизация</a>           
        @endguest
        @auth
        <div class="flex gap-x-8">
            <a href="{{route('account.index')}}" class="hover:text-orange-600 transition">{{Auth::user()->login}}</a>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="bg-red-600 px-2 rounded text-white hover:text-black hover:bg-white transition cursor-pointer">Выйти</button>
            </form>            
        </div>

     
        @endauth
    </header>
    <main class="flex-grow">{{$slot}}</main>
    <footer class="flex flex-col gap-y-2 px-8 py-2 items-center bg-orange-100 font-medium">
        <a href="{{route('home')}}" class="text-2xl text-center">Кофеманы</a>

        <nav class="flex gap-x-8 items-center">
            @auth
            @if(Auth::user()->is_admin == '1')
            <a href="{{route('users.index')}}" class="hover:text-orange-600 transition">Пользователи</a>
            <a href="{{route('products.index')}}" class="hover:text-orange-600 transition">Товары</a>
            @endif
            <a href="{{route('clients.index')}}" class="hover:text-orange-600 transition">Клиенты</a>
            <a href="{{route('orders.index')}}" class="hover:text-orange-600 transition">Заказы</a>
            @endauth
        </nav>

    </footer>
</body>
</html>