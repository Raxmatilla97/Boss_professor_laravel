<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Kelib tushgan murojaatlar ro'yxati") }}
        </h2>

    </x-slot>


    {{-- Sahifada yangilanish qilganda o'ng tarafda chiqadigan bildirishnoma --}}
    @include('reyting.dashboard.professor.frogments.edit.toaster')


    <div class="py-1 mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div id="alert-additional-content-1"
                class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                role="alert">
                <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Kordinatorlardan, moderatorlarda va operatorlardan kelib
                        tushgan ma'lumotlar.</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    Kelgan ma'lumotlarni ko'rib baholab chiqing.
                </div>
                <div class="flex justify-end">
                    {{-- <a href="{{ route('moderator.create', ['professor_id' => $professor->id]) }}"><button type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yangi
                            moderator yaratish</button></a> --}}
                </div>
            </div>


        </div>
        <div class="max-w-8xl mx-auto sm:px-1 lg:px-1">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-1 bg-white border-b border-gray-200">

                    <div class="flex justify-center mt-4 ml-4">
                        <a href="{{route('murojatlar.list')}}">
                            <button type="button"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                                Barcha kelgan ma'lumotlar
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                    {{$filter->count()}}
                                </span>
                            </button>
                        </a>
                        <a href="{{route('murojatlar.category',  ['category' => 'kutulmoqda'])}}">
                            <button type="button"
                                class="text-indigo-400 hover:text-white border border-indigo-400 hover:bg-indigo-500 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-indigo-300 dark:text-indigo-300 dark:hover:text-white dark:hover:bg-indigo-400 dark:focus:ring-indigo-900">
                                Tasdiqlash lozim bo'lganlar
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-indigo-800 bg-indigo-200 rounded-full">
                                    {{$filter->where('ariza_holati', 'kutulmoqda')->count()}}
                                </span>
                            </button>
                        </a>
                        <a href="{{route('murojatlar.category',  ['category' => 'maqullandi'] )}}">
                            <button type="button"
                                class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                                Tasdiqlangan ma'lumotlar
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-green-800 bg-green-200 rounded-full">
                                    {{$filter->where('ariza_holati', 'maqullandi')->count()}}
                                </span>
                            </button>
                        </a>
                        <a href="{{route('murojatlar.category',  ['category' => 'rad_etildi'] )}}">
                            <button type="button"
                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                Rad etilgan ma'lumotlar
                                <span
                                    class="inline-flex items-center justify-center w-4 h-4 ms-2 text-xs font-semibold text-red-800 bg-red-200 rounded-full">
                                    {{$filter->where('ariza_holati', 'rad_etildi')->count()}}
                                </span>
                            </button>
                        </a>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="p-6 text-gray-900 mb-8">
                            <form class="mb-6" action="{{ route('murojatlar.search') }}" method="get">

                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Qidirish</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="input" name="name" id="default-search"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kordinator, Moderator yoki Operator ism familyasini yozing...">
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Qidirish</button>
                                </div>
                            </form>



                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                @if (count($murojatlar) > 0)
                                    <table
                                        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="p-4">
                                                    <div class="flex items-center">
                                                        №
                                                    </div>
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    F.I.SH
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Yo'nalish
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Ma'lumot holati
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Berilgan ball
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Vaqti
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Bajarish
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($murojatlar as $item)
                                                <tr
                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td class="w-4 p-4">
                                                        <div class="flex items-center font-bold">
                                                            {{ $i++ }}
                                                        </div>
                                                    </td>
                                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                        <img class="hidden sm:block w-10 h-10 rounded-full" style="object-fit: cover;" src="{{ $item->surat }}" alt="">
                                                        <div class="ps-3" style="    width: 300px;">
                                                            <div class="text-base font-semibold" style="max-width: 260px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                                {{ $item->name }}
                                                            </div>
                                                            <div class="font-normal text-gray-500">
                                                                @if ($item->professor_id)
                                                                    Kordinator
                                                                @elseif($item->moderator_id)
                                                                    Moderator
                                                                @else
                                                                    Operator
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </th>
                                                    
                                                    <td class="px-6 py-4">
                                                        {{ $item->category_name }}
                                                    </td>

                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            @if ($item->ariza_holati == 'maqullandi')
                                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                                </div>
                                                                Maqullangan!
                                                            @elseif($item->ariza_holati == 'kutulmoqda')
                                                                <div
                                                                    class="h-2.5 w-2.5 rounded-full bg-indigo-500 me-2">
                                                                </div>
                                                                Ko'rib chiqish lozim!
                                                            @else
                                                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                                </div>
                                                                Rad etilgan
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @if ($item->ariza_holati == 'maqullandi')
                                                            <span
                                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $item->points }}
                                                                - ball</span>
                                                        @elseif($item->ariza_holati == 'rad_etildi')
                                                            <span
                                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Hisoblanmadi!</span>
                                                        @else
                                                            <span
                                                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Baholanmagan!</span>
                                                        @endif

                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $item->created_at }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="{{ route('murojatlar.show', $item->id) }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ko'rish</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">
                                        Murojaatlar kelib tushmagan!</h1>
                                    @include('reyting.frontend.frogments.skeletonTable')
                                @endif

                            </div>
                            <div class=" items-center justify-between mt-6">
                                {{ $murojatlar->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
