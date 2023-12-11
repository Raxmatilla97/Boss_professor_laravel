
<div class="py-1">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div id="alert-additional-content-1" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <div class="flex items-center">
              <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <h3 class="text-lg font-medium">Yangi moderator yaratishingiz mumkin!</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Buning uchun "Yangi moderator yaratish" tugmasiga bosing va sahifada so'ralgan ma'lumotlarni kiritib yaratish tugmasini bosing.
            </div>
            <div class="flex justify-end">
                <a href="{{ route('moderator.create', ['id' => $professor->id]) }}"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Yangi moderator yaratish</button></a>
            </div>
          </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 mb-8">

                @php
                $i = 1;
                @endphp

                <div id="accordion-color" data-accordion="collapse"
                    data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                    @foreach ($professor_moder as $item)
                    <h2 id="accordion-color-heading-{{$item->id}}">
                        <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                            data-accordion-target="#accordion-color-body-{{$item->id}}"
                            aria-expanded="true"
                            aria-controls="accordion-color-body-{{$item->id}}">
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        №{{$i++}}
                                    </div>
                                </td>
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full"
                                        src="https://cspi.uz/storage/app/media/2023/avgust/i.webp"
                                        alt="Jese image">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{
                                            substr($item->moder_fish, 0,
                                            strpos($item->moder_fish, ' ',
                                            strpos($item->moder_fish, ' ') + 1)) }}
                                        </div>
                                        <div class="font-normal text-gray-500">
                                            {{$item->moder_slug_number}}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    Umumiy ball: 204
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if ($item->moder_status == 1)
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                        </div> Aktiv!
                                        @else
                                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                        </div> Aktiv emas!
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                </td>
                            </tr>
                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </button>
                    </h2>


                    <div id="accordion-color-body-{{$item->id}}" class="hidden"
                        aria-labelledby="accordion-color-heading-{{$item->id}}">
                        <div
                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                            <p class="text-gray-500 dark:text-gray-400">Moderator <b><span
                                        class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$item->moder_fish}}</span></b>ga
                                Biriktirilgan mavzu nomi:</p>
                            <blockquote
                                class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                <p
                                    class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                    Mavzu: "{{$item->moder_small_info}}"</p>
                            </blockquote>
                            </p>
                            <p class="text-gray-500 dark:text-gray-400">Moderator tomonidan
                                yuklangan fayllar va ularga qo'yilgan ballar:</p>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                    <ul role="list"
                                        class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                        <li
                                            class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                            <div class="flex w-0 flex-1 items-center">
                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <span
                                                        class="truncate font-medium">resume_back_end_developer.pdf</span>
                                                    <span
                                                        class="flex-shrink-0 text-gray-400">23.11.2023</span>
                                                </div>
                                            </div>
                                            <div class="mr-28 flex-shrink-0">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Category_name
                                                    dfg df gdf gdf gfd fg</span>
                                            </div>
                                            <div class="mr-28 flex-shrink-0">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball:
                                                    102</span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="#"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                            </div>
                                        </li>
                                        <li
                                            class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                            <div class="flex w-0 flex-1 items-center">
                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                    viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                    <span
                                                        class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                                    <span
                                                        class="flex-shrink-0 text-gray-400">4.5mb</span>
                                                </div>
                                            </div>
                                            <div class="mr-28 flex-shrink-0">
                                                <span
                                                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball:
                                                    102</span>
                                            </div>
                                            <div class="ml-4 flex-shrink-0">
                                                <a href="#"
                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                            </div>
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                            <div class="inline-flex items-center justify-center w-full mb-3">
                                <hr class=" h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700"
                                    style="width: 920px;">
                                <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900 flex">
                                    <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                        <path
                                            d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />

                                    </svg>

                                    <p class="ml-2 mr-2"> OPERATORLAR</p>

                                    <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
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
                                <div id="accordion-nested-collapse" data-accordion="collapse"
                                    class="mt-4 mb-12 m-auto w-[1100px]">
                                    <h2 id="accordion-nested-collapse-heading-1">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 rounded-t-xl font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-nested-collapse-body-1"
                                            aria-expanded="false"
                                            aria-controls="accordion-nested-collapse-body-1">
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">
                                                            Fayziyev Raxmatilla Xanshor o'g'li
                                                        </div>
                                                        <div class="font-normal text-gray-500">
                                                            3JHlo3J54oO!ool</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                        </div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon
                                                class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-nested-collapse-body-1"
                                        class="hidden mb-5"
                                        aria-labelledby="accordion-nested-collapse-heading-1">
                                        <div
                                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <p class="text-gray-500 dark:text-gray-400">
                                            <blockquote
                                                class="p-4 my-4 border-s-4 text-sm border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                                <b>Mavzu:</b> Lorem ipsum dolor sit amet
                                                consectetur adipisicing elit. Quod fugit cumque
                                                beatae nisi! Inventore omnis, quae mollitia nemo
                                                dolore iusto quibusdam. Aspernatur dolore quasi
                                                tenetur expedita magni minima ut voluptates.
                                            </blockquote>


                                            </p>

                                            <div
                                                class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                                <dd
                                                    class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    <ul role="list"
                                                        class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                        <li
                                                            class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                            <div
                                                                class="flex w-0 flex-1 items-center">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                                    viewBox="0 0 20 20"
                                                                    fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                                        clip-rule="evenodd">
                                                                    </path>
                                                                </svg>
                                                                <div
                                                                    class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                    <span
                                                                        class="truncate font-medium">resume_back_end_developer.pdf</span>
                                                                    <span
                                                                        class="flex-shrink-0 text-gray-400">2.4mb</span>
                                                                </div>
                                                            </div>
                                                            <div class="mr-28 flex-shrink-0">
                                                                <span
                                                                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball:
                                                                    102</span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                                            </div>
                                                        </li>
                                                        <li
                                                            class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                            <div
                                                                class="flex w-0 flex-1 items-center">
                                                                <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                                    viewBox="0 0 20 20"
                                                                    fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                                        clip-rule="evenodd">
                                                                    </path>
                                                                </svg>
                                                                <div
                                                                    class="ml-4 flex min-w-0 flex-1 gap-2">
                                                                    <span
                                                                        class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                                                    <span
                                                                        class="flex-shrink-0 text-gray-400">4.5mb</span>
                                                                </div>
                                                            </div>
                                                            <div class="mr-28 flex-shrink-0">
                                                                <span
                                                                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball:
                                                                    102</span>
                                                            </div>
                                                            <div class="ml-4 flex-shrink-0">
                                                                <a href="#"
                                                                    class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </dd>
                                            </div>


                                        </div>
                                    </div>
                                    <h2 id="accordion-nested-collapse-heading-2">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-nested-collapse-body-2"
                                            aria-expanded="false"
                                            aria-controls="accordion-nested-collapse-body-2">
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">
                                                            Fayziyev Raxmatilla Xanshor o'g'li
                                                        </div>
                                                        <div class="font-normal text-gray-500">
                                                            3JHlo3J54oO!ool</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                        </div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon
                                                class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-nested-collapse-body-2" class="hidden"
                                        aria-labelledby="accordion-nested-collapse-heading-2">
                                        <div
                                            class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <p class="text-gray-500 dark:text-gray-400">Another
                                                difference is that Flowbite relies on smaller
                                                and standalone components, whereas Tailwind UI
                                                offers sections of pages.</p>
                                        </div>
                                    </div>
                                    <h2 id="accordion-nested-collapse-heading-3">
                                        <button type="button"
                                            class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                            data-accordion-target="#accordion-nested-collapse-body-3"
                                            aria-expanded="false"
                                            aria-controls="accordion-nested-collapse-body-3">
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">
                                                            Fayziyev Raxmatilla Xanshor o'g'li
                                                        </div>
                                                        <div class="font-normal text-gray-500">
                                                            3JHlo3J54oO!ool</div>
                                                    </div>
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div
                                                            class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                        </div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#"
                                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon
                                                class="w-3 h-3 rotate-180 shrink-0"
                                                aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 10 6">
                                                <path stroke="currentColor"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5 5 1 1 5" />
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="accordion-nested-collapse-body-3" class="hidden"
                                        aria-labelledby="accordion-nested-collapse-heading-3">
                                        <div
                                            class="p-5 border border-gray-200 dark:border-gray-700">
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">We
                                                actually recommend using both Flowbite, Flowbite
                                                Pro, and even Tailwind UI as there is no
                                                technical reason stopping you from using the
                                                best of two worlds.</p>
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">
                                                Learn more about these technologies:</p>
                                            <ul
                                                class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                                <li><a href="https://flowbite.com/pro/"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite
                                                        Pro</a></li>
                                                <li><a href="https://tailwindui.com/"
                                                        rel="nofollow"
                                                        class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind
                                                        UI</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End: Nested accordion -->
                            </div>
                            <div class="inline-flex items-center justify-center w-full ">
                                <hr
                                    class="w-full h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">

                            </div>

                        </div>
                    </div>
                    @endforeach





                </div>
            </div>
        </div>
    </div>

</div>
