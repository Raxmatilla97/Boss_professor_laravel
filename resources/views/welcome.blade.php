@extends('layouts.frontend')
@section('content')
    @if (session('success'))
        <div style="background: url('{{ asset('assets/images/bg-success.webp') }}') no-repeat center center; background-size: cover; z-index: 1;"
            id="notification-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"
            x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)">
            <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                <div class="mt-3 text-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Bildirishnoma!
                    </h3>
                    <div class="mt-2 px-1 py-3">
                        <div id="alert-additional-content-1"
                            class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                            role="alert">
                            <div class="flex items-center">
                                <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <h3 class="text-lg font-medium">Murojatingiz qabul qilindi!</h3>
                            </div>
                            <div class="mt-2 mb-4 text-md">

                                {{ session('success') }}
                            </div>

                        </div>
                    </div>
                    <div class="items-center px-4 py-3">
                        <button id="close-modal"
                            onclick="document.getElementById('notification-modal').style.display='none'"
                            class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md w-5/12 shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Yoping
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif



    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-8">
        @foreach ($professors as $item)
            <!-- Sample Card -->
            <div class="bg-white p-5 rounded shadow-lg relative">

                <img src="{{ '/uploads/professor_images' }}/{{ $item->image }}" alt="{{ $item->fish }}"
                    class="w-full h-62 object-cover mb-4 rounded">
                <span
                    class="absolute top-7 left-7 px-2 py-1 text-md font-semibold tracking-wider text-white uppercase bg-blue-600 rounded">Ball:
                    {{ $item->custom_ball }}</span>
                <h3 class="text-2xl font-bold mb-2">{{ $item->fish }}</h3>
                <p class="text-gray-700">
                <p class="font-medium">Mavzu:</p> {{ $item->small_info }}
                </p>

                <div class="space-x-8 mt-5 flex justify-between">
                    <button onclick="toggleModal({{ $item->id }})"
                        class="bg-blue-500 text-white px-4 py-2 rounded">Moderatorlar
                        ro'yxati</button>
                    <a href="{{ route('show.index', $item->slug_number) }}"
                        class="bg-green-500 text-center text-white px-4 py-2 rounded">To'liq ko'rish</a>
                </div>

                <style>
                    /* Mobil qurilmalar uchun (masalan, 600px dan kichikroq ekranlar uchun) */
                    @media only screen and (max-width: 600px) {
                        .modal {
                            width: 100%;
                            /* Ekran o'lchamiga mos */
                            min-width: 0;
                            /* Min-width o'chirilgan */
                        }

                        .close-button {
                            overflow: hidden;
                        }
                    }

                    /* Tablet qurilmalar uchun (masalan, 600px dan 1024px gacha) */
                    @media only screen and (min-width: 601px) and (max-width: 1024px) {
                        .modal {
                            width: 80%;
                            /* Ekran o'lchamiga mos, biroz kengroq */
                            min-width: 0;
                            /* Min-width o'chirilgan */
                        }
                    }

                    /* Desktop qurilmalar uchun (1025px dan yuqori) */
                    @media only screen and (min-width: 1025px) {
                        .modal {
                            width: 900px;
                            /* Sizning hozirgi o'lchamingiz */
                            min-width: 1200px;
                            /* Min-width saqlanib qolgan */
                            min-height: 650px;
                        }
                    }
                </style>

                <div class="overlay" id="overlay{{ $item->id }}" data-id="{{ $item->id }}">
                    <div class="modal" style="z-index: 1000;">
                        <div class="md:flex">
                            <!-- Navigation tabs -->
                            <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0"
                                style="min-width: 350px;">
                                <!-- Loop through moderators to create tabs -->
                                @foreach ($item->moderator as $moderator)
                                    <!-- Tab link -->
                                    <li>
                                        <a href="#" onclick="openCity(event, 'Moderator{{ $moderator->id }}')"
                                            id="defaultOpen"
                                            class="tablinks inline-flex items-center px-4 py-3 text-white bg-blue-700 rounded-lg active w-full dark:bg-blue-600"
                                            aria-current="page">
                                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                            </svg>
                                            {{ $moderator->moder_fish }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Content for each tab -->
                            @foreach ($item->moderator as $moderator)
                                <div id="Moderator{{ $moderator->id }}"
                                    class="moderator-content p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg mx-auto"
                                    style="display: none;">
                                    <div class="flex justify-center pb-8">
                                        @if ($moderator->moder_image)
                                            <img style="width: 300px; height: 300px; object-fit: cover; object-position: 50% 50%;"
                                                class="rounded"
                                                src="/uploads/moderator_images/{{ $moderator->moder_image }}"
                                                alt="{{ $moderator->moder_fish }}">
                                        @else
                                            <img style="width: 300px; height: 300px; object-fit: cover; object-position: 50% 50%;"
                                                class="rounded" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp"
                                                alt="{{ $moderator->moder_fish }}">
                                        @endif

                                    </div>

                                    <h3 class="text-xl text-center font-bold text-gray-900 dark:text-white mb-2">
                                        {{ $moderator->moder_fish }}</h3>

                                    <blockquote
                                        class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                        <p class="text-lg italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                            "{{ $moderator->moder_small_info }}"</p>
                                    </blockquote>

                                </div>
                            @endforeach

                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Birinchi moderator-contentni topish va ko'rsatish
                                var firstContent = document.querySelector('#overlay{{ $item->id }} .moderator-content');
                                if (firstContent) {
                                    firstContent.style.display = 'block';
                                }
                            });
                        </script>



                        {{-- <div>
                            <!-- Close button -->
                            <button onclick="closeModal({{ $item->id }})"
                                class="bg-red-500 text-white px-4 py-2 mt-4 rounded close-button">Yopish</button>
                        </div> --}}
                    </div>


                    <style>
                        .modal {
                            position: relative;
                            /* Modal oynani pozitsiyalash uchun asos */
                        }

                        .close-button {
                            position: absolute;
                            /* Tugmani modal oynaga nisbatan joylashtiradi */
                            bottom: 10px;
                            /* Yuqoridan masofa */
                            right: 10px;
                            /* O'ngdan masofa */
                            z-index: 1001;
                            /* Tugma boshqa elementlardan yuqorida bo'ladi */
                        }
                    </style>


                </div>


            </div>
        @endforeach

        <!-- Continue to create more cards as per required -->

    </div>
    <script>
        // Hujjat yuklanganda, har bir overlay uchun event listener qo'shish
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.overlay').forEach(function(overlay) {
                overlay.addEventListener('click', function(event) {
                    // Agar bosilgan element overlay bo'lsa, modalni yopish
                    if (event.target === overlay) {
                        closeModal(overlay.getAttribute('data-id'));
                    }
                });
            });
        });

        // Modalni yopish funksiyasi
        function closeModal(itemId) {
            var modal = document.getElementById('overlay' + itemId);
            if (modal) {
                modal.style.display = 'none';
            }
        }
    </script>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>


    <script>
        var lastOpenedModal = null;

        function toggleModal(cardNumber) {
            var overlayId = "overlay" + cardNumber;
            var overlayElement = document.getElementById(overlayId);

            if (lastOpenedModal) {
                lastOpenedModal.style.display = "none";
            }

            overlayElement.style.display = "flex";
            lastOpenedModal = overlayElement;
        }

        function closeModal(cardNumber) {
            var overlayId = "overlay" + cardNumber;
            var overlayElement = document.getElementById(overlayId);
            overlayElement.style.display = "none";
            lastOpenedModal = null;
        }
    </script>


    <script>
       function openCity(evt, moderatorId) {
    // Barcha tabcontentlarni yashirish
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("moderator-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Barcha tablinklarni o'chirish
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Tanlangan tabcontentni va tablinkni ko'rsatish
    document.getElementById(moderatorId).style.display = "block";
    evt.currentTarget.className += " active";
}
    </script>
@endsection
