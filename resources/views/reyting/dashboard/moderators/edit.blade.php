<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Moderator ma'lumotlarini o'zgartirish") }}
        </h2>

    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- Breadcrumb -->
            <nav class="flex px-5 mb-4 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
                aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="{{ route('dashboard') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Bosh sahifa
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('professors.index') }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Professorlar
                                ro'yxati</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{ route('professors.edit', $moderator->professor->slug_number) }}"
                                class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Professor
                                ma'lumotlarini tahirlash</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Moderator
                                ma'lumotlarini tahrirlash</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Moderator ma'lumotlarini tahrirlash</h1>
                    <form action="{{ route('moderator.update', ['moderator' => $moderator]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        {{-- <input type="hidden" name="professor_id" value="{{ $professor_info['id'] }}"> --}}

                        <div class="mb-4">
                            <label for="moder_image" class="block text-gray-600">Moderator suratini yuklash:</label>
                            <input type="file" name="moder_image" id="moder_image" value="{{ old('moder_image') }}"
                                class="form-control @error('moder_image') is-invalid @enderror  accept="image/*"
                                onchange="previewImage(event)">

                            @error('moder_image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($moderator->moder_image)
                            <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full"
                                src="/uploads/moderator_images/{{ $moderator->moder_image }}" alt="Image Preview"
                                style="display: none;">
                        @else
                            <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full"
                                src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Image Preview"
                                style="display: none;">
                        @endif

                        <div class="mb-5">
                            <label for="moder_fish" class="block text-gray-600">Moderator
                                F.I.SH:</label>
                            <input type="text" name="moder_fish" value="{{ old('moder_fish', $moderator->moder_fish) }}" id="moder_fish"
                                class="border px-4 py-2 w-full" required>
                            @error('moder_fish')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="moder_small_info" class="block text-gray-600">Moderator mavzusi
                                haqida:</label>
                            <textarea name="moder_small_info" id="moder_small_info" class="border px-4 py-2 w-full" rows="4">{{ old('moder_small_info', $moderator->moder_small_info) }}</textarea>
                            @error('moder_small_info')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-8">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="1" name="moder_status" class="hidden peer"
                                {{ $moderator->moder_status == 1 ? 'checked' : '' }}>
                                <div
                                    class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini
                                    belgilash</span>
                            </label>
                        </div>

                        <div class="mb-4 mt-6 text-right flex justify-between">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"  type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-small rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">O'chirish</button>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4">Moderatorni tahrirlash</button>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </div>

    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Oynani yopish</span>
                </button>
                <form action="{{ route('moderator.destroy', $moderator->id )}}" method="post">
                    @csrf
                    @method('delete')
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Moderatorni o'chirishni istaysizmi? 
                        <p class="mt-3 text-sm">Agarda moderatorni o'chirsangiz unga tegishli operatorlarham o'chib ketadi!</p></h3>
                      
                            <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                Ha, o'chirilsin
                            </button>                       
                    
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Yo'q, oynani yopish</button>
                </div>
            </form>
            </div>
        </div>
    </div>
      
   

    <script>
        function previewImage(event) {
            var input = event.target;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
