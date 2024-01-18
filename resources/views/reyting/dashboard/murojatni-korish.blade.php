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
                    <p class="text-gray-500 dark:text-gray-400">
                        @if ($information->professor_id)
                            Kordinator
                        @elseif($information->moderator_id)
                            Moderator
                        @else
                            Operator
                        @endif
                        tomonidan yuklangan fayllar va ularga qo'yilgan ballar:
                    </p>
                    <form action="{{ route('murojatlar.murojatniTasdiqlash') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $information->id }}">
                        <div class="px-4 py-6 ml-8 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0 ">
                            <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">


                                <ol
                                    class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 bg-green-200 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-green-900">
                                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-green-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 16 12">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5.917 5.724 10.5 15 1.5" />
                                            </svg>
                                        </span>
                                        <h3 class="font-medium leading-tight">Foydalanuvchi ma'lumotlarni yuborgan!</h3>
                                        <p class="text-sm">Ma'lumotlar serverga kelib tushgan.</p>
                                    </li>
                                    <li class="mb-10 ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 bg-green-100 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                            <svg class="w-3.5 h-3.5 text-green-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 16">
                                                <path
                                                    d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                                            </svg>
                                        </span>
                                        <h3 class="font-medium leading-tight">Ma'lumotni ko'rish va tekshirish
                                        </h3>
                                        <p class="text-sm">Yuborilgan ma'lumotlarni tekshiring</p>
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
                                                                class="bg-pink-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Sayt
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
                                                                <h2 class="text-gray-700 text-lg font-bold mb-2">
                                                                    Yuklangan
                                                                    fayl nomi:</h2>

                                                                @if (isset($information->filename))
                                                                    @if (in_array($extension, $allowedExtensions))
                                                                        @if (strlen($filename) > 60)
                                                                            {{ substr($filename, 0, 60) . '...' }}
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
                                                                    {{ strlen($information->site_url) > 60
                                                                        ? substr(str_replace(['www.', 'http://', 'https://'], '', $information->site_url), 0, 60) . '...'
                                                                        : $information->site_url }}
                                                                    <span
                                                                        class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">WEB</span>
                                                                @endif


                                                            </div>

                                                            <div class="mb-6">
                                                                <h2 class="text-gray-700 text-lg font-bold mb-2">
                                                                    Murojaat
                                                                    yaratilgan vaqt:</h2>
                                                                <p class="text-gray-600 text-sm">
                                                                    {{ $information->created_at }}</p>
                                                            </div>

                                                            <div class="flex items-center justify-between">
                                                                <a href="/storage/upload/files/{{ $information->filename }}"
                                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                                                    download>
                                                                    Yuklab olish
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
                                            class="absolute flex items-center justify-center w-8 h-8 @if ($information->ariza_holati == 'maqullandi') bg-green-100 @else bg-gray-100 @endif  rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                            <svg class="w-3.5 h-3.5 @if ($information->ariza_holati == 'maqullandi') text-green-500  @else text-gray-500 @endif dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 18 20">
                                                <path
                                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                            </svg>
                                        </span>
                                        <h3 class="font-medium leading-tight">Baholash va natija haqida yozish</h3>
                                        <p class="text-sm">Yuborilgan murojaat bo'yicha baholash va natijani yozib
                                            qo'yish
                                        </p>

                                        <div
                                            class="max-w-5xl mt-6 mx-auto bg-white rounded-xl top-bottom-shadow overflow-hidden">
                                            <div class="p-6">
                                                @if ($errors->any())
                                                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                                        role="alert">
                                                        <strong class="font-bold">Xatolar mavjud!</strong>
                                                        <span class="block sm:inline">
                                                            Iltimos, quyidagi xatolarni to'g'rilang:
                                                        </span>
                                                        <ul class="list-disc pl-5 mt-3">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                @if (session('success'))
                                                    <div class="fixed top-3 right-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                                        role="alert">
                                                        <strong class="font-bold">Muvaffaqiyat!</strong>
                                                        <span class="block sm:inline">{{ session('success') }}</span>
                                                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                                            <svg class="fill-current h-6 w-6 text-green-500"
                                                                role="button"
                                                                onclick="this.parentElement.parentElement.remove();"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20">
                                                                <title>Yopish</title>
                                                                <path
                                                                    d="M14.348 14.859l-4.708-4.708 4.708-4.708a1 1 0 0 0-1.414-1.414l-4.708 4.708-4.708-4.708a1 1 0 1 0-1.414 1.414l4.708 4.708-4.708 4.708a1 1 0 1 0 1.414 1.414l-4.708-4.708 4.708 4.708a1 1 0 0 0 1.414-1.414z" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                @endif

                                                <!-- Category Item -->
                                                <div class="mt-4 flex mb-4">
                                                    <div class="label-box" style="width: 300px;">
                                                        <i class="fas fa-tags text-blue-500"></i>
                                                        <span class="ml-2 text-lg font-medium">Murojaat holati:</span>
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="countries"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ariza
                                                            holatini tanlang</label>
                                                        <select id="countries" name="murojaat_holati"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option value="kutulmoqda"
                                                                {{ $information->ariza_holati == 'kutulmoqda' ? 'selected' : '' }}>
                                                                Ariza hali ko'rib
                                                                chiqilmagan!</option>
                                                            <option value="maqullandi"
                                                                {{ $information->ariza_holati == 'maqullandi' ? 'selected' : '' }}>
                                                                Ariza maqullandi!
                                                            </option>
                                                            <option value="rad_etildi"
                                                                {{ $information->ariza_holati == 'rad_etildi' ? 'selected' : '' }}>
                                                                Ariza rad etildi!
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- URL Site -->
                                                <div class="mt-4 flex mb-4">
                                                    <div class="label-box" style="width: 300px;">
                                                        <i class="fas fa-link text-purple-500"></i>
                                                        <span class="ml-2 text-lg font-medium">Murojatga reyting
                                                            bali:</span>
                                                    </div>
                                                    <div>

                                                        <div class="relative w-full">

                                                            <div
                                                                class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 18 20">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
                                                                </svg>
                                                            </div>

                                                            <input type="text" id="simple-search"
                                                                value="{{ old('points', $information->points) }}"
                                                                name="murojaat_bali"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="0-100" required>
                                                            <script>
                                                                document.getElementById('simple-search').addEventListener('input', function(event) {
                                                                    this.value = this.value.replace(/[^0-9]/g, '');
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- File Upload Info -->
                                                <div class="mt-4 flex">
                                                    <div class="label-box" style="width: 300px;">
                                                        <i class="fas fa-file-upload text-red-500"></i>
                                                        <span class="ml-2 text-lg font-medium">Murojaat holati
                                                            izohi:</span>
                                                    </div>

                                                    <div class="w-full">

                                                        <label for="message"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agar
                                                            maqullanmagan bo'lsa nima uchunligini yozing.</label>
                                                        <textarea id="message" rows="4" name="murojaat_izohi"
                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Assalomu alaykum, sizning ....">{{ old('arizaga_javob', $information->arizaga_javob) }}</textarea>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ms-6">
                                        <span
                                            class="absolute flex items-center justify-center w-8 h-8 @if ($information->ariza_holati == 'maqullandi') bg-green-100 @else bg-gray-100 @endif  rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 dark:bg-gray-700">
                                            <svg class="w-3.5 h-3.5 @if ($information->ariza_holati == 'maqullandi') text-green-500 @else text-gray-500 @endif  dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 18 20">
                                                <path
                                                    d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                                            </svg>
                                        </span>
                                        <h3 class="font-medium leading-tight">Natijani saqalash</h3>
                                        <p class="text-sm">Yozilgan va belgilangan ma'lumotlarni saqlash</p>

                                        <div class="my-4">
                                            <div class="flex p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                                                role="alert">
                                                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path
                                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div style="width: 100%;">
                                                    <span class="font-medium">Saqlashdan oldin bir bor tekshirib
                                                        ko'ring:</span>
                                                    <ul class="mt-1.5 list-disc list-inside">
                                                        <li>Yuborilgan ma'lumotlar tog'riligiga</li>
                                                        <li>Ariza holatini tog'ri belgilaganizga</li>
                                                        <li>Tog'ri reyting balini yozganizga</li>
                                                        <li>Tog'ri murozat izohini yozganizga</li>

                                                    </ul>
                                                    <div class="flex justify-center">
                                                        <button type="submit"
                                                            class="mt-4  text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Barcha
                                                            ma'lumotlar tog'ri va saqlash mumkin</button>

                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </li>
                                </ol>

                            </dd>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

</x-app-layout>
