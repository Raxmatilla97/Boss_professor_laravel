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
                            <a href="{{ route('professors.edit', $professor_info['slug']) }}"
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
                    <h1 class="text-2xl font-bold mb-6">Professorga moderator qo'shish</h1>
                    <form action="{{ route('moderator.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
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
                            <textarea name="moder_small_info" id="moder_small_info" class="border px-4 py-2 w-full" rows="4">{{ old('moder_small_info') }}</textarea>
                            @error('moder_small_info')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="1" name="moder_status" class="hidden peer"
                                    {{ old('moder_status') == 1 ? 'checked' : '' }}>
                                <div
                                    class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini
                                    belgilash</span>
                            </label>
                        </div>

                        <div class="mb-4 text-right">
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4">Moderatorni tahrirlash</button>
                        </div>
                    </form>
                </div>


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
