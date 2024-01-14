<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Kelib tushgan murojaatlar ro'yxati") }}
        </h2>

    </x-slot>

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
                        tushgan murojaatlar.</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    Ularni ko'rib baholab chiqing.
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

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="p-6 text-gray-900 mb-8">
                            <form class="mb-6" action="{{ route('murojatlar.list') }}" method="get">

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
                                    <input type="search" name="name" id="default-search"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kordinator, Moderator yoki Operator ism familyasini yozing...">
                                    <button type="submit"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Qidirish</button>
                                </div>
                            </form>



                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input id="checkbox-all-search" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-all-search" class="sr-only"> </label>
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                F.I.SH
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Yo'nalish
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Murojaat holati
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
                                        @foreach ($murojatlar as $item)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        <input id="checkbox-table-search-1" type="checkbox"
                                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="checkbox-table-search-1"
                                                            class="sr-only">checkbox</label>
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    <img class="w-10 h-10 rounded-full" src="{{ $item->surat }}"
                                                        alt="Jese image">
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">{{ $item->name }}</div>
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
                                                            <div class="h-2.5 w-2.5 rounded-full bg-indigo-500 me-2">
                                                            </div>
                                                            Ko'rib chiqish lozim!
                                                        @else
                                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                                            Rad etilgan
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                   @if($item->ariza_holati == 'maqullandi')
                                                   <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $item->points }} - ball</span>
                                                   @elseif($item->ariza_holati == 'rad_etildi')
                                                   <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Hisoblanmadi!</span>
                                                   @else
                                                   <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Baholanmagan!</span>
                                                   @endif
                                                   
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $item->created_at }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="{{route('murojatlar.show', $item->id)}}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ko'rish</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
