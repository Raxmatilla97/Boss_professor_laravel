<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Moderatorlar umumiy ro'yxati") }}
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
                    <h3 class="text-lg font-medium">Yangi moderatorni faqat Kordinator tahrirlash sahifasidan qo'shasiz.</h3>
                </div>
                <div class="mt-2 mb-4 text-sm">
                    Buning uchun "Yangi moderator yaratish" tugmasiga bosing va sahifada so'ralgan ma'lumotlarni kiritib
                    yaratish tugmasini bosing.
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
                            <form class="mb-6" action="{{route('moderator.list')}}" method="get">
                               
                                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Qidirish</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="search" name="name" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Moderator ism familyasini yozing..." >
                                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Moderator qidirish</button>
                                </div>
                            </form>
                            @php
                            $i = ($moderators->currentPage() - 1) * $moderators->perPage() + 1;
                             @endphp

                           
                            <div id="accordion-color" data-accordion="collapse"
                                data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
    
                                @foreach ($moderators as $item)
                                    <h2 id="accordion-color-heading-{{ $item->id }}">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-1 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-color-body-{{ $item->id }}"
                                            aria-expanded="false" aria-controls="accordion-color-body-{{ $item->id }}">
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №{{ $i++ }}
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    @if ($item->moder_image)
                                                    <img class="hidden sm:block w-10 h-10 rounded-full" style=" object-fit: cover;"
                                                        src="/uploads/moderator_images/{{ $item->moder_image }}"
                                                        alt="Jese image">
                                                @else
                                                    <img class="hidden sm:block w-10 h-10 rounded-full"
                                                        src="https://cspi.uz/storage/app/media/2023/avgust/i.webp"
                                                        alt="Jese image">
                                                @endif
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">
                                                            {{ substr($item->moder_fish, 0, strpos($item->moder_fish, ' ', strpos($item->moder_fish, ' ') + 1)) }}
                                                        </div>
                                                        <div class="font-normal text-gray-500">
                                                            {{ str_pad(substr($item->moder_slug_number, 0, -3), strlen($item->moder_slug_number), '*', STR_PAD_RIGHT) }}
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: {{ $item->custom_ball}}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        @if ($item->moder_status == 1)
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                        </div> 
                                                        <p class="hidden sm:block">Aktiv!</p>
                                                    @else
                                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                        </div> 
                                                        <p class="hidden sm:block">Aktiv emas!</p>
                                                    @endif
                                                    </div>
                                                </td>
    
                                                <td class="px-6 py-4">
                                                    <a href="{{route('moderator.edit', ['moderator_id' => $item->id])}}"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
    
    
                                    <div id="accordion-color-body-{{ $item->id }}" class="hidden"
                                        aria-labelledby="accordion-color-heading-{{ $item->id }}">
                                        <div
                                            class="py-5 sm:px-2 md:px-4 lg:px-4 border border-b-1 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                            <div class="flex justify-center">
                                                 @if ($item->moder_image)
                                                 <img class="w-20 mr-8 h-20 rounded image_moder"
                                                 style="object-fit: cover; object-position: 50% 50%;"
                                                 src="/uploads/moderator_images/{{ $item->moder_image }}"
                                                 alt="{{ $item->moder_fish }}">
                                                @else
                                                    <img class="hidden sm:block w-10 h-10 rounded-full"
                                                        src="https://cspi.uz/storage/app/media/2023/avgust/i.webp"
                                                        alt="Jese image">
                                                @endif
    
                                                <p class="mb-2 p-3 text-gray-500 dark:text-gray-400 ">
                                                <p class="text-gray-500 text-xl mt-6 dark:text-gray-400">Moderator <b>
                                                        <span
                                                            class="bg-green-100 text-green-800 text-m font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $item->moder_fish }}</span></b>ga
                                                    Biriktirilgan mavzu nomi:</p>
                                                </p>
                                            </div>
    
                                            <blockquote
                                                class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                                <p
                                                    class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                                    Mavzu: "{{ $item->moder_small_info }}"</p>
                                            </blockquote>
                                            <div class="flex justify-end">
                                                <span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                                   Moderator ID raqami: <b>{{$item->moder_slug_number}}</b>
                                                </span>
                                            </div>
                                           
    
                                            <p class="text-gray-500 dark:text-gray-400">Moderator tomonidan
                                                yuklangan fayllar va ularga qo'yilgan ballar:</p>
                                            <div class="px-1 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    <ul role="list"
                                                        class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                        @if (count($item->files) > 0)
                                                            @foreach ($item->files as $files_or_urls)
                                                                @include('reyting.frontend.frogments.showProfessorFiles')
                                                            @endforeach
                                                        @else
                                                        <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">Ma'lumotlar joylanmagan!</h1>
                                                            @include('reyting.frontend.frogments.skeletonTable')
                                                        @endif
                                                    </ul>
                                                </dd>
                                            </div>
                                            <div class="inline-flex items-center justify-center w-full mb-3">
                                                <hr class=" h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700"
                                                    style="width: 920px;">
                                                <div
                                                    class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900 flex">
                                                    <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 14">
                                                        <path
                                                            d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
    
                                                    </svg>
    
                                                    <p class="ml-2 mr-2"> OPERATORLAR</p>
    
                                                    <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 14">
                                                        <path
                                                            d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
    
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="w-md">
                                                <p class="text-gray-500 dark:text-gray-400">Moderatorga
                                                    Operatorlarni birlashtirganizdan so'ng bu yerda ularning ism
                                                    sharifi ko'rinadi!</p>
    
                                                <!-- Nested accordion -->
                                                <div id="accordion-nested-collapse-{{ $item->id }}"
                                                    data-accordion="collapse" class="mt-4 mb-12 m-auto w-full">
    
                                                    @foreach ($item->operator as $items)
                                                        <h2 id="accordion-nested-collapse-heading-{{ $items->id }}">
                                                            <button type="button"
                                                                class="flex items-center justify-between w-full p-3 rounded-t-xl font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                                data-accordion-target="#accordion-nested-collapse-body-{{ $items->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="accordion-nested-collapse-body-{{ $items->id }}">
                                                                <tr
                                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                                    <td class="w-4 p-4">
                                                                        <div class="flex items-center">
                                                                            №{{ $loop->iteration }}
                                                                        </div>
                                                                    </td>
                                                                    <th scope="row"
                                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                                                    <div class="ps-3 md:min-w-0 custom-min-width-lg">
                                                                        <div class="text-base font-semibold">
                                                                            {{ $items->oper_fish }}
                                                                        </div>
                                                                        <div class="font-normal text-gray-500">
                                                                            {{ str_pad(substr($items->oper_slug_number, 0, -3), strlen($items->oper_slug_number), '*', STR_PAD_RIGHT) }}
                                                                        </div>
                                                                    </div>

                                                                    <style>
                                                                        @media (min-width: 1024px) { /* lg breakpoint uchun */
                                                                          .custom-min-width-lg {
                                                                            min-width: 500px;
                                                                          }
                                                                        }
                                                                        </style>
                                                                    
                                                                </th>
                                                                    <td class="px-6 py-4">
                                                                        Ball: {{$items->oper_custom_ball}}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        <div class="flex items-center">
                                                                            @if ($items->oper_status)
                                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                                            </div> 
                                                                            <p class="hidden sm:block">Aktiv!</p>
                                                                        @else
                                                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                                            </div> 
                                                                            <p class="hidden sm:block">Aktiv emas!</p>
                                                                        @endif
                                                                        </div>
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        <a href="{{route('operator.edit', ['operator_id' => $items->id])}}"
                                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                                    </td>
                                                                </tr>
                                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="none" viewBox="0 0 10 6">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5 5 1 1 5" />
                                                                </svg>
                                                            </button>
                                                        </h2>
                                                        <div id="accordion-nested-collapse-body-{{ $items->id }}"
                                                            class="hidden mb-5"
                                                            aria-labelledby="accordion-nested-collapse-heading-{{ $items->id }}">
                                                            <div
                                                                class="py-5 px-2 border border-b-0 border-gray-200 dark:border-gray-700">
                                                                <p class="text-gray-500 dark:text-gray-400">
                                                                <blockquote
                                                                    class="p-4 my-4 border-s-4 text-md border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                                                    <b>Mavzu:</b> {{ $items->oper_small_info }}
                                                                </blockquote>

                                                                <div class="flex justify-end">
                                                                    <span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                                                                       Operator ID raqami: <b>{{$items->oper_slug_number}}</b>
                                                                    </span>
                                                                </div>
    
                                                                </p>
    
                                                                <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                                                    <dd
                                                                        class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                                        <ul role="list"
                                                                            class="divide-y divide-gray-100 rounded-md border border-gray-200">
    
                                                                            @if (count($items->files) > 0)
                                                                                @foreach ($items->files as $files_or_urls)
                                                                                    @include('reyting.frontend.frogments.showProfessorFiles')
                                                                                @endforeach
                                                                            @else
                                                                            <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">Ma'lumotlar joylanmagan!</h1>
                                                                                @include('reyting.frontend.frogments.skeletonTable')
                                                                            @endif
    
    
    
    
                                                                        </ul>
                                                                    </dd>
                                                                </div>
    
    
                                                            </div>
                                                        </div>
                                                    @endforeach
    
    
                                                </div>
                                                <!-- End: Nested accordion -->
                                                {{ $moderators->links()}}
                                            </div>
                                            <div class="inline-flex items-center justify-center w-full ">
                                                <hr class="w-full h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
    
                                            </div>
    
                                        </div>
                                    </div>
                                @endforeach
    
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
