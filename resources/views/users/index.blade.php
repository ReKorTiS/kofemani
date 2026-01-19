<x-layout>
    <x-slot:title>Кофеманы - пользователи</x-slot:title>
    <section class="grid py-8 justify-center">
    <div class="grid border p-4 rounded ">
        <h2 class="text-center text-3xl font-medium pb-4">Пользователи</h2>
            <ul class="grid grid-cols-7 bg-orange-100 p-3 text-xl font-medium gap">
                <li>Фамилия</li>
                <li>Имя</li>
                <li>Отчество</li>
                <li>Email</li>
                <li>Логин</li>
                <li>Тип аккаунта</li>
                <li class="text-center">Управление</li>
            </ul>
        @foreach($users as $user)
        <ul class="grid grid-cols-7 odd:bg-gray-100 p-3 hover:bg-gray-200 gap">
                <li>{{$user->lastname}}</li>
                <li>{{$user->firstname}}</li>
                <li>{{$user->patronymic}}</li>
                <li>{{$user->email}}</li>
                <li>{{$user->login}}</li>
                <li>
                @if($user->is_admin == '1')
                        Администратор
                    @else
                        Менеджер
                    @endif
                </li>
                <li>
                    <div class="grid grid-cols-2 gap-x-2">
                        <a href="{{route('user.updatepage', $user)}}" class="bg-orange-950 px-2 rounded border border-orange-950 text-white hover:text-black hover:bg-white transition text-center">Редактировать</a>
                        @if(Auth::user()->id !== $user->id)
                        <form action="{{route('user.delete', $user)}}" method="post" class="grid">
                            @method('delete')
                            @csrf
                                <button type="submit" class="bg-red-600 px-2 rounded text-white hover:text-black hover:bg-white transition cursor-pointer text-center">Удалить</button>                            
                        </form>                        
                        @endif


                    </div>
                </li>
            </ul>
        @endforeach
        <div class="pb-2 py-6 text-center">
            <a href="{{route('user.storepage')}}" class="text-center  bg-orange-950 text-white cursor-pointer hover:text-black hover:bg-white border border-orange-950 p-2 rounded transition">Создать пользователя</a>
        </div>
       
    </div>
    
</section>
</x-layout>