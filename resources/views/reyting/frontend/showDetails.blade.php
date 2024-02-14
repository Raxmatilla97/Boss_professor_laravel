@extends('layouts.frontend')
@section('content')

    <style>
        @media only screen and (max-width: 768px) {}

        /* Mobil qurilmalar uchun (masalan, 600px dan kichikroq ekranlar uchun) */
        @media only screen and (max-width: 600px) {
            .image_moder {
                margin-top: 20px;
            }

            .operator_name {
                max-width: 200px;
            }
        }

        /* Tablet qurilmalar uchun (masalan, 600px dan 1024px gacha) */
        @media only screen and (min-width: 601px) and (max-width: 1024px) {}

        /* Desktop qurilmalar uchun (1025px dan yuqori) */
        @media only screen and (min-width: 1025px) {

            .operator_name {
                width: 370px;
            }

        }
    </style>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div>

                        <div class="flex flex-col items-center px-4 sm:px-0 lg:flex-row lg:justify-between">
                            <div class="mb-4 lg:mb-0">
                                <h3 class="text-base font-semibold leading-7 text-gray-900">Foydalanuvchi haqida ma'lumotlar
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Reyting ballari o'zgarib turushi
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
                                            class=" text-lg font-medium me-2 px-2.5 py-0.5 rounded-full ">Umumiy ball:
                                            {{ $info->custom_ball }}</span>
                                    </div>
                                </div>

                            </div>
                            <img class="rounded w-4/5 sm:w-2/4 md:w-1/3 lg:w-1/6"
                                src="{{ $info->image }}" alt="Extra large avatar" style="width: 189px; height: 200px; object-fit: cover;">
                        </div>

                        {{-- dddd --}}

                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">To'liq F.I.SH</dt>
                                    <dd class="mt-1 text-xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        {{ $info->fish }}</dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">Foydalanuvchining shaxsiy ballari
                                    </dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                            {{ $info->shaxsiy_custom_ball }} ballga ega
                                        </span>
                                    </dd>
                                </div>
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-md font-medium leading-6 text-gray-900">Ilmiy yo‘nalish mavzusi nomi
                                    </dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white">
                                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-600 mb-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                                <path
                                                    d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                            </svg>
                                            "{{ $info->small_info }}"
                                        </blockquote>
                                    </dd>
                                </div>
                              

                            </dl>
                        </div>
                    </div>
                    <hr class="mb-8 mt-3">
                    <p class="text-gray-500 dark:text-gray-400 pl-4 m-auto text-center" style="width: 90%">
                        <span
                            class="bg-gray-100 text-gray-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            Foydalanuvchi tomonidan yuklangan fayllar va ularga qo'yilgan ballar:</span>
                    </p>
                    <div class="px-0 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                        <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                @if ($info->files->count() > 0)
                                    @foreach ($paginator as $files_or_urls)
                                        @include('reyting.frontend.frogments.showProfessorFiles')
                                    @endforeach                                  

                                    <div class="m-auto mx-3">
                                        <div class="mb-5 mt-8">
                                            {{ $paginator->appends(request()->all())->links() }}
                                        </div>
                                    
                                    </div>                                   
                                   
                                @else
                                    <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">Ma'lumotlar
                                        joylanmagan!</h1>
                                    @include('reyting.frontend.frogments.skeletonTable')
                                @endif
                            </ul>
                        </dd>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
