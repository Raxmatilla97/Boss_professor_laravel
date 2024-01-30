<style>
    @media only screen and (max-width: 600px) {
        .svg {
            display: none;

        }

        .data {
            display: none;
        }
    }
</style>

<style>
    @media (max-width: 772px) {
        .my-div {
            display: none !important;
            /* !important bilan o'zgartirishni kuchaytiramiz */
        }
    }

    @media (min-width: 1200px) {
        .my-div {
            max-width: 50%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
        }
    }

    @media (max-width: 1199px) {
        .my-div {
            max-width: 40%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
        }
    }

    @media (max-width: 1000px) {
        .my-div {
            max-width: 30%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: flex;
            font-size: 8px;
        }
    }
</style>
<li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
    <div class="flex w-0 mr-3 flex-1 items-center">
        <svg class="w-6 h-6 svg text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 19">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4" />
        </svg>
        <div class="ml-4 flex min-w-0 flex-1 gap-2">
            <span class="truncate font-medium">
                @if (isset($files_or_urls->filename) && $files_or_urls->filename != 'Yuklanmagan!')
                    @php
                        $filename = pathinfo($files_or_urls->filename, PATHINFO_FILENAME);
                        $extension = pathinfo($files_or_urls->filename, PATHINFO_EXTENSION);
                        $allowedExtensions = ['zip', 'doc', 'docx', 'pdf'];
                    @endphp

                    @if (in_array($extension, $allowedExtensions))
                        {{-- @if (strlen($filename) > 10)
                            {{ substr($filename, 0, 10) . '...' }}
                        @else
                            {{ $filename }}
                        @endif --}}

                        @if (isset($files_or_urls->site_url))
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a
                                    target="_blank"
                                    href="/storage/upload/files/{{ $files_or_urls->filename }}">{{ '' . strtoupper($extension) }}</a>
                                + <a target="_blank" href="{{ $files_or_urls->site_url }}">WEB</a> </span>
                        @else
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a
                                    target="_blank"
                                    href="/storage/upload/files/{{ $files_or_urls->filename }}">{{ '' . strtoupper($extension) }}</a></span>
                        @endif
                    @else
                        {{ $files_or_urls->filename }}
                    @endif
                @else
                    {{-- {{ strlen($files_or_urls->site_url) > 15 ? substr(str_replace(['www.', 'http://', 'https://'], '', $files_or_urls->site_url), 0, 15) . '...' : $files_or_urls->site_url }} --}}
                    <span
                        class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a
                            target="_blank" href="{{ $files_or_urls->site_url }}">WEB</a></span>
                @endif
            </span>
            <span class="flex-shrink-0 data text-gray-400">{{ $files_or_urls->created_at->format('d-M-Y') }}</span>
        </div>
    </div>
    <div class="mr-6  my-div flex-shrink-0 items-start">
        {{-- <span data-tooltip-target="tooltip-mavzu"
            class="bg-blue-100 text-blue-800 text-center text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ substr($files_or_urls->category_name, 0, 70) . '...' }}</span> --}}
        <span
            class="bg-blue-100 text-blue-800 text-center text-sm font-sm me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ $files_or_urls->category_name }}</span>



    </div>

    <div class="mr-3 flex-shrink-0">
        <span
            class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Ball:
            @if (empty($files_or_urls->points))
                0
            @else
                {{ $files_or_urls->points }}
            @endif

        </span>
    </div>

    <div class="mr-2 flex-shrink-0" style="    min-width: 105px;">
        @if ($files_or_urls->ariza_holati == 'maqullandi')
            <span
                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Maqullangan!</span>
        @elseif($files_or_urls->ariza_holati == 'rad_etildi')
            <span
                class="bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Rad
                etilgan!</span>
        @else
            <span
                class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Tekshiruvda
                !</span>
        @endif
    </div>

    <div class="mr-3 flex-shrink-0">
        <button type="button" data-modal-target="default-modal-{{ $files_or_urls->id }}"
            data-modal-toggle="default-modal-{{ $files_or_urls->id }}"
            class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{-- <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
            </svg> --}}

            <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                    d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z" />
                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
            Ko'rish
        </button>
    </div>

    <!-- Main modal -->
    <div id="default-modal-{{ $files_or_urls->id }}" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Murojaatni mazmunini to‘liq ko‘rish
                    </h3>
                    <span
                        class="bg-gray-100 ml-4 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">ID
                        #{{ $files_or_urls->id }}</span>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal-{{ $files_or_urls->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Yopish</span>
                    </button>
                </div>
                <!-- Modal body -->
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <ol class="relative border-s border-gray-200 dark:border-gray-600 ms-3.5 mb-4 md:mb-5">
                        <li class="mb-10 ms-8">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                <svg class="w-2.5 h-2.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                </svg>
                            </span>
                            <h3 class="flex items-start mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                Murojaat yuborilgan <span
                                    class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">{{ $files_or_urls->created_at->format('d-M-Y') }}</span>


                            </h3>
                            <p class="block mb-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400">
                                <b>Tanlangan bo'lim:</b> {{ $files_or_urls->category_name }}
                            </p>
                            <p class="block mb-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400"><b>Web
                                    sayt:</b>
                                @if ($files_or_urls->site_url)
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><a
                                            href="{{ $files_or_urls->site_url }}" target="_blank">
                                            {{ strlen($files_or_urls->site_url) > 15 ? substr(str_replace(['www.', 'http://', 'https://'], '', $files_or_urls->site_url), 0, 105) . '...' : $files_or_urls->site_url }}
                                        </a></span>
                                @else
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Web
                                        sayt sahifasi yozilmagan.</span>
                                @endif
                            </p>
                            <p class="block mb-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400">
                                <b>Yuklangan fayl:</b>
                                @if ($files_or_urls->filename)
                                    <br>
                                    <div class="flex justify-start">
                                        <a href="/storage/upload/files/{{ $files_or_urls->filename }}"
                                            target="_black"><button type="button"
                                                class="inline-flex items-center py-2 mr-4  mt-3 px-3 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800  focus:outline-none rounded-lg border border-gray-200 focus:z-10  focus:ring-4 focus:ring-blue-300 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-3 h-3 me-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M5 7.8C6.7 6.3 9.2 5 12 5s5.3 1.3 7 2.8a12.7 12.7 0 0 1 2.7 3.2c.2.2.3.6.3 1s-.1.8-.3 1a2 2 0 0 1-.6 1 12.7 12.7 0 0 1-9.1 5c-2.8 0-5.3-1.3-7-2.8A12.7 12.7 0 0 1 2.3 13c-.2-.2-.3-.6-.3-1s.1-.8.3-1c.1-.4.3-.7.6-1 .5-.7 1.2-1.5 2.1-2.2Zm7 7.2a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                                Ko'rish
                                            </button>
                                        </a>
                                        <a href="/storage/upload/files/{{ $files_or_urls->filename }}"
                                            target="_black"
                                            download="/storage/upload/files/{{ $files_or_urls->filename }}">
                                            <button type="button"
                                                class="inline-flex items-center py-2 mt-3 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-600">
                                                <svg class="w-3 h-3 me-1.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                    <path
                                                        d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                </svg>
                                                Yuklab olish
                                            </button>
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <span
                                            class="bg-indigo-100  text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">Murojaatda
                                            fayl yuklanmagan!</span>

                                    </div>
                                @endif
                            </p>

                            <p class="block mb-3 mt-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400">
                                <b>Ilmiy izlanishda duch kelingan muommolar:</b><br>
                            <p>

                            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                role="alert">
                                <span class="font-medium">Matn mazmuni:</span>
                                @if ($files_or_urls->duch_kelingan_muommo)
                                    {{ $files_or_urls->duch_kelingan_muommo }}
                                @else
                                    Ilmiy izlanishda duch kelingan muommolar haqida yozilmagan!
                                @endif
                            </div>
                            </p>
                            </p>
                        </li>
                        <li class="mb-10 ms-8">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                <svg class="w-2.5 h-2.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                </svg>
                            </span>
                            <h3 class="flex items-start mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                Murojaatni tasdiqlash
                                @if ($files_or_urls->ariza_holati == 'maqullandi')
                                    <span
                                        class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">
                                        {{ $files_or_urls->updated_at->format('d-M-Y') }}
                                    </span>
                                @elseif($files_or_urls->ariza_holati == 'rad_etildi')
                                    <span
                                        class="bg-pink-100 text-pink-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300 ms-3">Rad
                                        etilgan!</span>
                                @else
                                    <span
                                        class="bg-purple-100 text-purple-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300 ms-3">Tekshiruvda
                                        !</span>
                                @endif
                            </h3>

                            <p class="block mb-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400">
                                <b>Murojaatga qo'yilgan ball:</b>
                                @if (empty($files_or_urls->points) ||
                                        $files_or_urls->ariza_holati == 'rad_etildi' ||
                                        $files_or_urls->ariza_holati == 'kutulmoqda')
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">0-ball</span>
                                @else
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300 ms-3">
                                        {{ $files_or_urls->points }}-ball</span>
                                @endif

                            </p>


                            <p class="block mb-3 text-sm font-normal leading-1 text-gray-500 dark:text-gray-400">
                                <b>Murojaatga yozilgan tasnif:</b>

                            <div class="flex items-center p-4 mb-4 text-sm @if ($files_or_urls->ariza_holati == 'maqullandi') text-blue-800 bg-blue-50 @elseif($files_or_urls->ariza_holati == 'rad_etildi') text-red-800 bg-red-50 @elseif($files_or_urls->ariza_holati == 'kutulmoqda') text-gray-800 bg-gray-50 @endif rounded-lg dark:bg-gray-800 dark:text-blue-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Mazmun:</span>
                                    @if ($files_or_urls->arizaga_javob)
                                        {{ $files_or_urls->arizaga_javob }}.
                                    @else
                                        Tekshiruvchi tomonidan tasnif yozilmgan!
                                    @endif
                                </div>
                            </div>
                            </p>



                        </li>
                        {{-- <li class="ms-8">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-gray-100 rounded-full -start-3.5 ring-8 ring-white dark:ring-gray-700 dark:bg-gray-600">
                                <svg class="w-2.5 h-2.5 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />
                                </svg>
                            </span>
                            <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Flowbite Library
                                v1.2.2</h3>
                            <time
                                class="block mb-3 text-sm font-normal leading-none text-gray-500 dark:text-gray-400">Released
                                on December 2nd, 2021</time>
                        </li> --}}
                    </ol>

                </div>
                <!-- Modal footer -->
                <div
                    class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">

                    <button data-modal-hide="default-modal-{{ $files_or_urls->id }}" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Yopish</button>
                </div>
            </div>
        </div>
    </div>

</li>
