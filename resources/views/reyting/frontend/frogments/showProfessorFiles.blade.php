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
            display: none !important; /* !important bilan o'zgartirishni kuchaytiramiz */
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
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a target="_blank" href="/storage/upload/files/{{ $files_or_urls->filename }}">{{ '' . strtoupper($extension) }}</a>
                                + <a target="_blank" href="{{$files_or_urls->site_url}}">WEB</a> </span>
                        @else
                            <span
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a target="_blank" href="/storage/upload/files/{{ $files_or_urls->filename }}">{{ '' . strtoupper($extension) }}</a></span>
                        @endif
                    @else
                        {{ $files_or_urls->filename }}
                    @endif
                @else
                    {{-- {{ strlen($files_or_urls->site_url) > 15 ? substr(str_replace(['www.', 'http://', 'https://'], '', $files_or_urls->site_url), 0, 15) . '...' : $files_or_urls->site_url }} --}}
                    <span
                        class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300"><a target="_blank" href="{{$files_or_urls->site_url}}">WEB</a></span>
                @endif
            </span>
            <span class="flex-shrink-0 data text-gray-400">{{ $files_or_urls->created_at->format('d-M-Y') }}</span>
        </div>
    </div>   
    <div class="mr-6  my-div flex-shrink-0 items-start" >
        {{-- <span data-tooltip-target="tooltip-mavzu"
            class="bg-blue-100 text-blue-800 text-center text-sm font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{ substr($files_or_urls->category_name, 0, 70) . '...' }}</span> --}}
            <span 
            class="bg-blue-100 text-blue-800 text-center text-sm font-sm me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">{{$files_or_urls->category_name}}</span>
       


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
                class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Tekshiruvda    !</span>
        @endif
    </div>
    <div class="mr-3 flex-shrink-0">
        <button type="button" class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            {{-- <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
            </svg> --}}

            <svg class="w-4 h-4 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
              </svg>
           Ko'rish
            </button>
    </div>
</li>
