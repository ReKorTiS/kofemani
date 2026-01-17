<x-layout>
    <x-slot:title>Кофеманы - главная</x-slot:title>
    <section class="grid">
            <div class="flex text-center py-4 justify-center">
                 <h2 class="py-4 px-6 text-2xl font-medium bg-orange-950 text-white rounded w-2/3 md:w-1/2 ">Статистика продаж за период: с 10.01.2026 по 13.01.2026</h2>
            </div>
            <div class="grid gap-y-4 md:flex justify-center p-4 text-center gap-x-8 ">
                <article class="bg-white py-8 text-center px-4 md:w-1/3 rounded border">
                    <h3 class="text-2xl text-orange-950">Общее количество созданных заказов</h3>
                    <p class="text-4xl font-medium py-1">20</p>
                </article>
                <article class="bg-white py-8 text-center px-4 md:w-1/3 rounded border">
                    <h3 class="text-2xl text-orange-950 ">Общая сумма по всем заказам</h3>
                    <p class="text-4xl font-medium py-1">60000 ₽</p>
                </article>
            </div>
        </section>
        <section class="grid">
            <div class="grid md:flex items-center justify-center gap-y-6 p-4 text-center gap-x-8 ">
                <article class="bg-white py-8 md:w-1/3 rounded h-full border">
                    <div class="flex flex-col gap-y-4 px-6">
                        <h3 class="text-2xl text-orange-950 h-15">Количество заказов по пользователю</h3>
                        <hr>    
                        <ul class="grid grid-cols-3 justify-center bg-orange-950 text-white py-3 text-center px-4 rounded font-bold ">
                            <li>Пользователь</li>
                            <li>Email</li>
                            <li>Количество</li>
                        </ul>
            <!--Тестовые пользователи-->
                        <div class="grid gap-y-4">
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300 ">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li>2</li>
                            </ul>
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li>2</li>
                            </ul> 
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li>2</li>
                            </ul> 
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li>2</li>
                            </ul>                          
                            <ul class="grid grid-cols-3 justify-center text-center px-4">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li>2</li>
                            </ul> 
                        </div>
                    </div>
                </article>
                <article class="bg-white py-8 text-center md:w-1/3 rounded h-full border">
                    <div class="flex flex-col gap-y-4 px-6">
                        <h3 class="text-2xl text-orange-950 h-15">Сумма по заказам по каждому пользователю</h3>
                        <hr>    
                        <ul class="grid grid-cols-3 justify-center bg-orange-950 text-white py-3 text-center px-4 rounded font-bold">
                            <li>Пользователь</li>
                            <li>Email</li>
                            <li>Сумма</li>
                        </ul>
            <!--Тестовые пользователи-->
                        <div class="grid gap-y-4">
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li class="text-green-600 font-bold">3000 ₽</li>
                            </ul>
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li class="text-green-600 font-bold">3000 ₽</li>
                            </ul> 
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li class="text-green-600 font-bold">3000 ₽</li>
                            </ul> 
                            <ul class="grid grid-cols-3 justify-center text-center px-4 border-b pb-4 border-gray-300">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li class="text-green-600 font-bold">3000 ₽</li>
                            </ul>                          
                            <ul class="grid grid-cols-3 justify-center text-center px-4">
                                <li>Иванов И.А.</li>
                                <li>ivanov.ia@mail.ru</li>
                                <li class="text-green-600 font-bold">3000 ₽</li>
                            </ul> 
                        </div>
                    </div>
                </article>
            </div>
        </section>
</x-layout>