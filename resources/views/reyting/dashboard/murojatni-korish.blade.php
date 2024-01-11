<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Kelib tushgan murojaatni ko'rish") }}
        </h2>

    </x-slot>

    <div class="py-1 mt-6 mb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div>

                        <div class="flex flex-col items-center px-4 sm:px-0 lg:flex-row lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">Murojaat yuboruvchi haqida
                                    ma'lumotlar
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Reyting ballari o'zgarib
                                    turushi
                                    mumkin!</p>
                            </div>
                            <div class="mb-4 lg:mb-0">
                                <div class="flex items-center p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium"></span> <span
                                            class=" text-lg font-medium me-2 px-2.5 py-0.5 rounded-full ">Umumiy yig'gan
                                            ballari:
                                            {{ $information->custom_ball }}</span>
                                    </div>
                                </div>

                            </div>
                            <img class="rounded w-36 h-36" src="{{ $information->surat }}" alt="Extra large avatar">
                        </div>



                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">To'liq F.I.SH</dt>
                                    <dd class="mt-1 text-xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        {{ $information->fish_info }}</dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">Umumiy to'plagan ballari
                                    </dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            {{ $information->custom_ball }} ball
                                        </span>
                                    </dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">Ilmiy yo‘nalish nomi</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 18 14">
                                                <path
                                                    d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                            </svg>
                                            <p>"{{ $information->small_info }} "</p>
                                        </blockquote>
                                    </dd>
                                </div>

                            </dl>
                        </div>
                    </div>
                    <hr class="mb-8 mt-3">
                    <p class="text-gray-500 dark:text-gray-400">Professor tomonidan
                        yuklangan fayllar va ularga qo'yilgan ballar:</p>
                    <div class="px-4 py-6 ml-8 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0 ">
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">


                            <ol
                                class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5" />
                                        </svg>
                                    </span>
                                    <h3 class="font-medium leading-tight">Foydalanuvchi ma'lumotlarni yuborgan!</h3>
                                    <p class="text-sm">Ma'lumotlar serverga kelib tushgan.</p>
                                </li>
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                        <svg class="w-3.5 h-3.5 text-green-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                            <path
                                                d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <h3 class="font-medium leading-tight">Ma'lumotni ko'rish va tekshirib baxo qo'yish
                                    </h3>
                                    <p class="text-sm">Step details here</p>
                                    <style>
                                        .top-bottom-shadow {
                                            box-shadow: 0 -10px 15px -3px rgba(0, 0, 0, 0.1), 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                                        }

                                        .label-box {
                                            width: 200px;
                                        }
                                    </style>
                                    <div
                                        class="max-w-5xl mt-6 mx-auto bg-white rounded-xl top-bottom-shadow overflow-hidden">
                                        <div class="p-6">
                                            <h2 class="text-2xl mb-6 font-bold text-gray-800 text-center">
                                                {{ $information->fish_info }}ning Murojaati</h2>

                                            <!-- Category Item -->
                                            <div class="mt-4 flex">
                                                <div class="label-box">
                                                    <i class="fas fa-tags text-blue-500"></i>
                                                    <span class="ml-2 text-lg font-medium">Yo'nalish:</span>
                                                </div>
                                                <div>
                                                    <span
                                                        class="text-lg text-gray-600">{{ $information->category_name }}</span>
                                                </div>
                                            </div>
                                            <!-- Description -->
                                            <div class="mt-4 flex">
                                                <div class="label-box">
                                                    <i class="fas fa-align-left text-green-500"></i>
                                                    <span class="ml-2 text-lg font-medium">Tavsif:</span>
                                                </div>
                                                <div>
                                                    <p class="text-lg text-gray-600">description</p>
                                                </div>
                                            </div>
                                            <!-- URL Site -->
                                            <div class="mt-4 flex">
                                                <div class="label-box">
                                                    <i class="fas fa-link text-purple-500"></i>
                                                    <span class="ml-2 text-lg font-medium">Sayt URLi:</span>
                                                </div>
                                                <div>
                                                    @if ($information->site_url)
                                                        <a href="{{ $information->site_url }}"
                                                            class="text-lg text-blue-500">{{ $information->site_url }}</a>
                                                    @else
                                                        <span
                                                            class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Sayt
                                                            manzili yozilmagan!</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <!-- File Upload Info -->
                                            <div class="mt-4 flex">
                                                <div class="label-box">
                                                    <i class="fas fa-file-upload text-red-500"></i>
                                                    <span class="ml-2 text-lg font-medium">Fayl:</span>
                                                </div>

                                                @php
                                                    $filename = pathinfo($information->filename, PATHINFO_FILENAME);
                                                    $extension = pathinfo($information->filename, PATHINFO_EXTENSION);
                                                    $allowedExtensions = ['zip', 'doc', 'docx', 'pdf'];
                                                @endphp
                                                <div class="container mx-auto p-4">
                                                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                                                        <div class="mb-4">
                                                            <h2 class="text-gray-700 text-lg font-bold mb-2">Yuklangan
                                                                fayl nomi:</h2>
                                                            <p class="text-gray-600 text-sm">
                                                                @if (isset($information->filename))
                                                                @if (in_array($extension, $allowedExtensions))
                                                                    @if (strlen($filename) > 10)
                                                                        {{ substr($filename, 0, 10) . '...' }}
                                                                    @else
                                                                        {{ $filename }}
                                                                    @endif

                                                                    @if (isset($information->site_url))
                                                                        <span
                                                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ '' . strtoupper($extension) }}
                                                                            + WEB </span>
                                                                    @else
                                                                        <span
                                                                            class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ '' . strtoupper($extension) }}</span>
                                                                    @endif
                                                                @else
                                                                    {{ $information->filename }}
                                                                @endif
                                                            @else
                                                                {{ strlen($information->site_url) > 15 ? substr(str_replace(['www.', 'http://', 'https://'], '', $information->site_url), 0, 15) . '...' : $information->site_url }}
                                                                <span
                                                                    class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">WEB</span>
                                                                @endif

                                                            </p>
                                                        </div>

                                                        <div class="mb-6">
                                                            <h2 class="text-gray-700 text-lg font-bold mb-2">Created
                                                                At:</h2>
                                                            <p class="text-gray-600 text-sm">2024-01-11</p>
                                                        </div>

                                                        <div class="flex items-center justify-between">
                                                            <a href="download-link.png"
                                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                                                download>
                                                                Download
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </li>
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                        <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 18 20">
                                            <path
                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                        </svg>
                                    </span>
                                    <h3 class="font-medium leading-tight">Review</h3>
                                    <p class="text-sm">Step details here</p>
                                </li>
                                <li class="ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-8 h-8 bg-gray-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                        <svg class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 18 20">
                                            <path
                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                        </svg>
                                    </span>
                                    <h3 class="font-medium leading-tight">Confirmation</h3>
                                    <p class="text-sm">Step details here</p>
                                </li>
                            </ol>

                        </dd>
                    </div>

                </div>
            </div>
        </div>
    </div>


    </div>

</x-app-layout>
