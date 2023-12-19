<div class="py-1">
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
                <h3 class="text-lg font-medium">Yangi operator yaratishingiz mumkin!</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Buning uchun "Yangi moderator yaratish" tugmasiga bosing va sahifada so'ralgan ma'lumotlarni kiritib
                moderatorni tanlab yaratish tugmasini bosing.
            </div>
            <div class="flex justify-end">
                <a href="{{ route('operator.create', ['id' => $professor->id]) }}"><button type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yangi
                        Operator yaratish</button></a>
            </div>
        </div>

        {{-- List start --}}

        {{-- {{ dd($professor_operators_list)}} --}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white p-8 ">
            <div
                class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">

                <label for="table-search" class="sr-only">Qidirish</label>
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Operatorni qidirish">
                </div>
            </div>

            @php
            $i = 1;
            @endphp
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                            Moderator F.I
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Holati
                        </th>
                        <th scope="col" class="px-6 py-3">
                            O'zgartirish
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professor_operators_list as $items)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="text-center">
                            {{$i++}}
                        </th>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <div style="width: 40px; height: 40px; overflow: hidden; border-radius: 50%;">
                                @if ($items->oper_image)
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{'/uploads/operator_image'}}/{{$items->oper_image}}" alt="Jese image">
                                @else                                
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                @endif
                               
                            </div>
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{$items->oper_fish}}</div>
                                <div class="font-normal text-gray-500">{{$items->oper_slug_number}}</div>
                            </div>
                        </th>
                        
                        <td class="px-6 py-4">
                            {{$items->moderator->moder_fish}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($items->oper_status)
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv
                                @else
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Aktiv emas
                                @endif
                                
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash
                                </a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


        {{-- List end --}}


    </div>
</div>