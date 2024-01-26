<li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
    <div class="flex w-0 mr-3 flex-1 items-center">
        <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
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
                                class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">{{ '' . strtoupper($extension) }}</span>
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
            <span class="flex-shrink-0 text-gray-400">{{ $files_or_urls->created_at->format('d-M-Y') }}</span>
        </div>
    </div>
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
</li>
