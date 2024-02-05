@extends('layouts.frontend')
@section('content')
@push('styles')
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush
<!-- component -->
<div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
    style="background-image: url({{ asset('assets/thumb__1_0_0_0_auto.jpg') }});">
    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
    <div class="max-w-xl w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
        <div class="grid  gap-8 grid-cols-1">
            <div class="flex flex-col ">
                <div class="flex flex-col sm:flex-row items-center">
                    <h2 class="font-semibold text-lg mr-auto">Reyting uchun ma'lumot joylash</h2>
                    <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                </div>
                <div class="mt-5">
                    <div class="form mb-12">
                        <form id="fileUploadForm" action="{{ route('site.sendRequest') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="slug_number" value="{{ $user_info['slug_number'] }}">
                            <input type="hidden" name="position" value="{{ $user_info['position'] }}">
                            <input type="hidden" name="user_id" value="{{ $user_info['id'] }}">
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2">Chirchiq Davlat Pedagogika
                                    Universiteti<abbr class="hidden" title="required">*</abbr></label>
                                <div class="flex flex-col items-center py-6 md:flex-row md:items-start">
                                    @if ($user_info['image'] == '')
                                    <img class="mb-3 md:mb-0 md:mr-4 rounded-md object-cover md:self-start"
                                        src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Avatar Upload"
                                        style="width: 150px">
                                    @else
                                    <img class="mb-3 md:mb-0 md:mr-4 rounded-md object-cover md:self-start"
                                        src="{{ $user_info['img_path'] }}/{{ $user_info['image'] }}" alt="Avatar Upload"
                                        style="width: 150px">
                                    @endif


                                    <div class="text-center md:text-left">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                            {{ $user_info['position'] }}
                                        </span>
                                        <h3 class="font-semibold text-lg">
                                            {{ $user_info['fish'] }}
                                        </h3>
                                        <blockquote
                                            class="text-sm italic mt-4 font-semibold text-gray-900 dark:text-white">
                                            <p>Mavzu: "{{ $user_info['theme'] }}"</p>
                                        </blockquote>
                                    </div>
                                </div>



                                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                    <label for="countries"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Yo'nalishni
                                        tanlang</label>
                                    <select id="countries" name="category_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-700 focus:border-blue-700 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected>Tanlang...</option>
                                        @foreach ($mavzular_turi as $key => $value)
                                        <option class="w-1/2" value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>


                                </div>
                                <div class="flex-auto w-full mb-1 text-xs space-y-2">

                                    <label for="helper-text"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sahifa
                                        manzilini joylang</label>
                                    <input type="text" id="helper-text" name="site_url"
                                        aria-describedby="helper-text-explanation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="https://site.uz/manzil">
                                    <p id="helper-text-explanation "
                                        class="mt-2 text-sm text-gray-500 dark:text-gray-400">Sahifa manzilini
                                        qo'yishdan oldin o'sha sahifa ishlayotganligiga amin bo'ling! <br>
                                        <b>Sayt manzilini https:// bilan yozing!</b> <b
                                            class="text-blue-600 text-sm font-medium inline-block"> masalan:
                                            https://lib.cspu.uz/....</b>
                                    </p>

                                </div>

                                <div class="flex-auto w-full mb-1 text-xs space-y-2">

                                    <label for="message"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Muommolar
                                        haqida yozing</label>
                                    <textarea id="message" name="duch_kelingan_muommo" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Ilmiy izlanishignizda siz duch kelgan muommolar haqida yozishingiz mumkin..." ></textarea>
                                </div>

                                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                    <label for="filepond"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fayl
                                        yuklash</label>
                                    <input type="file" name="document" id="filepond">
                                </div>


                            </div>



                    </div>

                    <div class="mt-8 text-right md:space-x-3 md:block flex flex-col-reverse">
                        <a href="{{ '/' }}"><button
                                class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                Orqaga qaytish </button></a>
                        <button type="submit"
                            class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Davom
                            etish</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')

<script>
    document.getElementById('fileUploadForm').addEventListener('submit', function(event) {
        var selectedValue = document.getElementById('countries').value;
        if (selectedValue === "") {
            alert("Iltimos, biron-bir yo'nalishni tanlang!");
            event.preventDefault(); // Formani yuborilishini to'xtatadi
        }
    });
</script>


<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="{{ asset('file-size.js') }}"></script>
<script src="{{ asset('filepond.js') }}"></script>

<script>
    // Register the plugins
            FilePond.registerPlugin(
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType
            );

            // Set options
            FilePond.setOptions({
                acceptedFileTypes: [                    
                    'application/pdf'  
                ],
                server: {
                    process: {
                        url: '/temp/upload',
                        headers: {
                            'X-CSRF-TOKEN': "{{ @csrf_token() }}"
                        },
                        ondata: (formData) => {
                            // Bunda formData bu, FormData objecti va unga yangi maydon qo'shiladi
                            formData.append('user_id',
                            "{{ $user_info['id'] }}"); // Bu yerda foydalanuvchi IDsi qo'shilmoqda
                            formData.append('position',
                            "{{ $user_info['position'] }}"); // Bu yerda foydalanuvchi IDsi qo'shilmoqda
                            return formData; // Yangilangan formData qaytarilmoqda
                        }
                    }
                },
                fileValidateTypeDetectType: (source, type) =>
                    new Promise((resolve, reject) => {
                        // Do custom MIME type detection here and return with promise
                        resolve(type);
                    }),
            });

            // Get a reference to the file input element
            const inputElement = document.querySelector('input[name="document"]');

            // Create the FilePond instance
            const pond = FilePond.create(inputElement);
</script>
@endpush
@endsection