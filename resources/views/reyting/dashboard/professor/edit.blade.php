<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Professorlar') }}
        </h2>
    </x-slot>
    @if(session('toaster'))

        <div id="toast-top-left" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500    " role="alert">
            <div id="toast"  class="border border-solid border-green-500 border-t-3 border-b-3 border-l-2 border-r-2 shadow-green fixed top-6 right-6 mt-20 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">{{ session('toaster')[1] }}</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " onclick="dismissToast()" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <style>
            .shadow-green {
            box-shadow: 0 4px 6px -1px rgba(0, 255, 0, 0.1), 0 2px 4px -1px rgba(0, 255, 0, 0.06);
            }       
        </style>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    dismissToast();
                }, 5000); // Avtomatik yoqilish uchun 5 sekund kutamiz
            });

            function dismissToast() {
                var toast = document.getElementById('toast');
                toast.style.display = 'none';
            }
        </script>
    @endif



  <!-- head bo'lagi o'zgartirib, kerakli stil va skriptlarni qo'shing -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tablarni boshqarish uchun JavaScript kodi
        const tabs = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Aktiv tabni tanlash
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                // Faol kontentni ko'rsatish
                tabContents.forEach(tc => tc.classList.add('hidden'));
                tabContents[index].classList.remove('hidden');
            });
        });
    });
</script>
</head>
<body>
<div class="container mx-auto my-8" style="max-width: 1300px;">
    <div class="border rounded">
        <ul class="flex">
            <li class="mr-1">
                <a href="#" class="block py-2 px-4 bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 focus:outline-none focus:bg-gray-300 tab-link">Professor haqida ma'lumotlar</a>
            </li>
            <li class="mr-1">
                <a href="#" class="block py-2 px-4 bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 focus:outline-none focus:bg-gray-300 tab-link">Moderator qo'shish</a>
            </li>
            <!-- Boshqa tablar uchun ham shu tarzda linklar qo'shing -->
        </ul>
        <div class="p-4">
            <!-- Tab 1 kontenti -->
            <div class="tab-content">
                <div class="py-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="container mx-auto">
                                    <h1 class="text-2xl font-bold mb-6">Professor ma'lumotlarinio tahrirlash sahifasi</h1>
            
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible fade show mb-2 mt-4" role="alert">
                                        {{ $message }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
            
                                {{-- @if(session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif --}}
                            
                               
                                    <form action="{{ route('professors.update', ['professor' => $professor]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH') 
                                        <div class="mb-5">
                                            <label for="fish" class="block text-gray-600">Professor F.I.SH to'liq yozing:</label>
                                            <input type="text" name="fish" value="{{ old('fish') ?? $professor->fish }}" id="fish" class="border px-4 py-2 w-full" required>
                                            @error('fish')
                                            <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
            
                                        <div class="mb-4">
                                            <label for="image" class="block text-gray-600">Professor suratini yuklash:</label>
                                            <input 
                                                type="file" 
                                                name="image" 
                                                id="image"
                                                value="{{ old('image')}}"
                                                class="form-control @error('image') is-invalid @enderror  accept="image/*" onchange="previewImage(event)">
                                            
                                            @error('image')
                                                <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full" src="{{url('/uploads')}}/{{$professor->image}}" alt="Image Preview" style="display: none;">
                                        <div class="mb-4">                              
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" value="1" name="status" class="hidden peer" {{ $professor->status == 1 ? 'checked' : '' }}>
                                                <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600"></div>
                                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini belgilash</span>
                                              </label>
                                        </div>
            
                                        <div class="mb-4">
                                            <label for="small_info" class="block text-gray-600">Professor haqida qisqacha yozish:</label>
                                            <textarea name="small_info" id="small_info" class="border px-4 py-2 w-full" rows="6" >{{old('small_info') ?? $professor->small_info}}</textarea>
                                            @error('small_info')
                                            <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>                
                                   
                            
                                        <div class="mb-4 text-right">
                                            <button type="submit" class="bg-blue-500 text-white py-2 px-4">Yaratish</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <script>
                    function previewImage(event) {
                        var input = event.target;
                
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                
                            reader.onload = function (e) {
                                document.getElementById('image-preview').src = e.target.result;
                                document.getElementById('image-preview').style.display = 'block';
                            }
                
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>
            </div>
            <!-- Tab 2 kontenti -->
            <div class="hidden tab-content">
                <div class="py-2">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h1 class="text-2xl font-bold mb-6">Professorga moderator qo'shish</h1>
                                <div class="mb-5">
                                    <label for="moder_fish" class="block text-gray-600">Moderator F.I.SH:</label>
                                    <input type="text" name="moder_fish" value="{{ old('moder_fish')}}" id="moder_fish" class="border px-4 py-2 w-full" required>
                                    @error('moder_fish')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="moder_theme_info" class="block text-gray-600">Moderator mavzusi haqida:</label>
                                    <textarea name="moder_theme_info" id="moder_theme_info" class="border px-4 py-2 w-full" rows="4" >{{old('moder_theme_info')}}</textarea>
                                    @error('moder_theme_info')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>                
                                <div class="mb-4 text-right">
                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4">Moderator yaratish</button>
                                </div>
                            </div>

                          
                        </div>

                    </div>
                </div>

                <div class="py-1">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 mb-8">
                              

                              
                        <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
                            <h2 id="accordion-color-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            №1
                                        </div>
                                    </td>
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                        <div class="ps-3">
                                            <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                            <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                        </div>  
                                    </th>
                                    <td class="px-6 py-4">
                                        Umumiy ball: 204
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                    </td>
                                </tr>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">
                                    <p class="text-gray-500 dark:text-gray-400">Moderatorga Biriktirilgan mavzu:</p>
                                    <blockquote class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                        <p class="text-xl italic font-medium leading-relaxed text-gray-900 dark:text-white">Mavzu: "Flowbite is just awesome. It contains tons of predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your next SaaS application."</p>
                                    </blockquote>
                                </p>
                                <p class="text-gray-500 dark:text-gray-400">Moderator tomonidan yuklangan fayllar va ularga qo'yilgan ballar:</p>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">          
                                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                    <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                                            <span class="flex-shrink-0 text-gray-400">2.4mb</span>                   
                                            </div>
                                        </div>
                                        <div class="mr-28 flex-shrink-0">
                                            <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball: 102</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                        </div>
                                        </li>
                                        <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"></path>
                                            </svg>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                            <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                            <span class="flex-shrink-0 text-gray-400">4.5mb</span>                     
                                            </div>
                                        </div>
                                        <div class="mr-28 flex-shrink-0">
                                            <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball: 102</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                        </div>
                                        </li>
                                    </ul>
                                    </dd>
                                </div>
                                <div class="inline-flex items-center justify-center w-full mb-3">
                                    <hr class="w-64 h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                                    <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900">
                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z"/>
                                  </svg>
                                    </div>
                                </div>
                                <div class="w-md">
                                    <p class="text-gray-500 dark:text-gray-400">Moderatorga Operatorlarni birlashtirganizdan so'ng bu yerda ularning ism sharifi ko'rinadi!</p>

                                    <!-- Nested accordion -->
                                    <div id="accordion-nested-collapse" data-accordion="collapse" class="mt-4 mb-12 m-auto w-[1100px]">
                                        <h2 id="accordion-nested-collapse-heading-1">
                                        <button type="button" class="flex items-center justify-between w-full p-5 rounded-t-xl font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-nested-collapse-body-1" aria-expanded="false" aria-controls="accordion-nested-collapse-body-1">
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                                        <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                        </button>
                                        </h2>
                                        <div id="accordion-nested-collapse-body-1" class="hidden mb-5" aria-labelledby="accordion-nested-collapse-heading-1">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <p class="text-gray-500 dark:text-gray-400">
                                                <b>Mavzu:</b>  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod fugit cumque beatae nisi! Inventore omnis, quae mollitia nemo dolore iusto quibusdam. Aspernatur dolore quasi tenetur expedita magni minima ut voluptates.

                                            </p>

                                            <div class="px-4 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">          
                                                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                    <div class="flex w-0 flex-1 items-center">
                                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                        <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                                                        <span class="flex-shrink-0 text-gray-400">2.4mb</span>                   
                                                        </div>
                                                    </div>
                                                    <div class="mr-28 flex-shrink-0">
                                                        <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball: 102</span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                                    </div>
                                                    </li>
                                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                                                    <div class="flex w-0 flex-1 items-center">
                                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                        <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                                        <span class="flex-shrink-0 text-gray-400">4.5mb</span>                     
                                                        </div>
                                                    </div>
                                                    <div class="mr-28 flex-shrink-0">
                                                        <span class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">Ball: 102</span>
                                                    </div>
                                                    <div class="ml-4 flex-shrink-0">
                                                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Yuklash</a>
                                                    </div>
                                                    </li>
                                                </ul>
                                                </dd>
                                            </div>


                                        </div>
                                        </div>
                                        <h2 id="accordion-nested-collapse-heading-2">
                                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-nested-collapse-body-2" aria-expanded="false" aria-controls="accordion-nested-collapse-body-2">
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                                        <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                        </button>
                                        </h2>
                                        <div id="accordion-nested-collapse-body-2" class="hidden" aria-labelledby="accordion-nested-collapse-heading-2">
                                        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                            <p class="text-gray-500 dark:text-gray-400">Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                                        </div>
                                        </div>
                                        <h2 id="accordion-nested-collapse-heading-3">
                                        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-nested-collapse-body-3" aria-expanded="false" aria-controls="accordion-nested-collapse-body-3">
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                                                    <div class="flex items-center">
                                                        №1
                                                    </div>
                                                </td>
                                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                                        <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                                    </div>  
                                                </th>
                                                <td class="px-6 py-4">
                                                    Umumiy ball: 204
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center">
                                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                                </td>
                                            </tr>
                                            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                            </svg>
                                        </button>
                                        </h2>
                                        <div id="accordion-nested-collapse-body-3" class="hidden" aria-labelledby="accordion-nested-collapse-heading-3">
                                        <div class="p-5 border border-gray-200 dark:border-gray-700">
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">We actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                                            <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                                            <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                            <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                            <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                                            </ul>
                                        </div>
                                        </div>
                                    </div>
                            <!-- End: Nested accordion -->
                                </div>
                                <div class="inline-flex items-center justify-center w-full ">
                                    <hr class="w-full h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">
                                   
                                </div>

                            </div>
                            </div>
                            <h2 id="accordion-color-heading-2">
                                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="true" aria-controls="accordion-color-body-2">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                №1
                                            </div>
                                        </td>
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                                <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                            </div>  
                                        </th>
                                        <td class="px-6 py-4">
                                            Moderator
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                        </td>
                                    </tr>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                                <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
                            </div>
                            </div>

                            <h2 id="accordion-color-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="true" aria-controls="accordion-color-body-3">
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                №1
                                            </div>
                                        </td>
                                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold">Fayziyev Raxmatilla Xanshor o'g'li</div>
                                                <div class="font-normal text-gray-500">3JHlo3J54oO!ool</div>
                                            </div>  
                                        </th>
                                        <td class="px-6 py-4">
                                            Moderator
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktiv!
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tahrirlash</a>
                                        </td>
                                    </tr>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
                            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                                <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                                <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Boshqa tablarning kontentlarini ham shu tarzda qo'shing -->
                                </div>
                            </div>
                        </div>
</x-app-layout>
