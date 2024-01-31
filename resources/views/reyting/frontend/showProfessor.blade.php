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
                            <h3 class="text-base font-semibold leading-7 text-gray-900">Kordinator haqida ma'lumotlar
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
                                        {{ $professor->custom_ball }}</span>
                                </div>
                            </div>

                        </div>
                        <img class="rounded w-4/5 sm:w-2/4 md:w-1/3 lg:w-1/6"
                            src="{{ '/uploads/professor_images' }}/{{ $professor->image }}" alt="Extra large avatar">
                    </div>

                    {{-- dddd --}}

                    <div class="mt-6 border-t border-gray-100">
                        <dl class="divide-y divide-gray-100">
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-md font-medium leading-6 text-gray-900">To'liq F.I.SH</dt>
                                <dd class="mt-1 text-xl leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    {{ $professor->fish }}</dd>
                            </div>
                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-md font-medium leading-6 text-gray-900">Umumiy to'plagan ballari</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <span
                                        class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                        {{ $professor->custom_ball }} ball
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
                                        "{{ $professor->small_info }}"
                                    </blockquote>
                                </dd>
                            </div>

                            <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                <dt class="text-md font-medium leading-6 text-gray-900">Ilmiy yo‘nalish mavzusi
                                    muommolari</dt>
                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                    <p class="text-md italic font-semibold text-gray-900 dark:text-white">

                                        @if( $professor->small_info2)
                                        {{ $professor->small_info2 }}
                                        @else
                                        Ilmiy yo‘nalish mavzusi muommolari yozilmagan!
                                        @endif
                                    </p>
                                </dd>
                            </div>

                        </dl>
                    </div>
                </div>
                <hr class="mb-8 mt-3">
                <p class="text-gray-500 dark:text-gray-400">
                    <span
                        class="bg-gray-100 text-gray-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                        Kordinator tomonidan yuklangan fayllar va ularga qo'yilgan ballar:</span>
                </p>
                <div class="px-0 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                            @if (count($professor->files) > 0)
                            @foreach ($professor->files as $files_or_urls)
                            @include('reyting.frontend.frogments.showProfessorFiles')
                            @endforeach
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

<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="py-6 px-1 bg-white border-b border-gray-200">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6 px-2 text-gray-900 mb-8">

                    <div id="accordion-color" data-accordion="collapse"
                        data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">

                        @foreach ($professor_moder as $item)
                        <h2 id="accordion-color-heading-{{ $item->id }}">
                            <button type="button"
                                class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-1 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3"
                                data-accordion-target="#accordion-color-body-{{ $item->id }}" aria-expanded="false"
                                aria-controls="accordion-color-body-{{ $item->id }}">
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            №{{ $loop->iteration }}
                                        </div>
                                    </td>
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">


                                        @if ($item->moder_image)
                                        <img class="hidden sm:block w-10 h-10 rounded-full"
                                            src="/uploads/moderator_images/{{ $item->moder_image }}" alt="Jese image">
                                        @else
                                        <img class="hidden sm:block w-10 h-10 rounded-full"
                                            src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Jese image">
                                        @endif
                                        <div class="ps-3" style="width: 400px;">
                                            <div class="text-base font-semibold">
                                                {{-- {{ substr($item->moder_fish, 0, strpos($item->moder_fish, ' ',
                                                strpos($item->moder_fish, ' ') + 1)) }} --}}
                                                {{ $item->moder_fish }}
                                            </div>
                                            {{-- <div class="font-normal text-gray-500">
                                                {{ str_pad(substr($item->moder_slug_number, 0, -3),
                                                strlen($item->moder_slug_number), '*', STR_PAD_RIGHT) }}
                                            </div> --}}
                                        </div>
                                    </th>

                                    <td class="px-6 py-4">
                                        Umumiy Ball: {{ $item->custom_ball }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            @if ($item->moder_status == 1)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                            </div>
                                            <p class="hidden sm:block">Aktiv!</p>
                                            @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                            </div>
                                            <p class="hidden sm:block">Aktiv emas!</p>
                                            @endif
                                        </div>

                                    </td>
                                </tr>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>


                        <div id="accordion-color-body-{{ $item->id }}" class="hidden"
                            aria-labelledby="accordion-color-heading-{{ $item->id }}">
                            <div
                                class="py-5 px-2 border border-b-1 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <div class="flex justify-center">
                                    <img class="w-20 mr-8 h-20 rounded image_moder"
                                        style="object-fit: cover; object-position: 50% 50%;"
                                        src="/uploads/moderator_images/{{ $item->moder_image }}"
                                        alt="{{ $item->moder_fish }}">

                                    <p class="mb-2  text-gray-500 dark:text-gray-400 ">
                                    <p class="text-gray-500 text-xl mt-6 dark:text-gray-400">Moderator <b>
                                            <span
                                                class="bg-green-100 text-green-800 text-m font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{
                                                $item->moder_fish }}</span></b>ga
                                        Biriktirilgan mavzu nomi:</p>
                                    </p>
                                </div>

                                <div class="px-4 pt-6 sm:grid sm:grid-cols-3 text-center w-5/6 m-auto sm:gap-2 sm:px-0">
                                    <dt class="text-md font-medium leading-6 pt-6 text-gray-900">Ilmiy yo‘nalish mavzusi
                                        nom:
                                    </dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                        <blockquote
                                            class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                            <p
                                                class="text-sm italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                                "{{ $item->moder_small_info }}"</p>
                                        </blockquote>
                                    </dd>
                                </div>


                                <div
                                    class="px-4 pt-6 pb-6 sm:grid sm:grid-cols-3 text-center w-5/6 m-auto sm:gap-2 sm:px-0">
                                    <dt class="text-md font-medium leading-6 pt-4 text-gray-900">Ilmiy yo‘nalish mavzusi
                                        muommolari:</dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">

                                        <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                                            role="alert">
                                            <span class="font-medium">
                                                @if($item->moder_small_info2)
                                                {{ $item->moder_small_info2 }}
                                                @else
                                                Ilmiy yo‘nalish mavzusi muommolari yozilmagan!
                                                @endif
                                        </div>
                                    </dd>
                                </div>


                                <p class="text-gray-500 dark:text-gray-400">Moderator tomonidan
                                    yuklangan fayllar va ularga qo'yilgan ballar:</p>
                                <div class="px-1 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                        <ul role="list"
                                            class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                            @if (count($item->files) > 0)
                                            @foreach ($item->files as $files_or_urls)
                                            @include('reyting.frontend.frogments.showProfessorFiles')
                                            @endforeach
                                            @else
                                            <h1 class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">
                                                Ma'lumotlar joylanmagan!</h1>
                                            @include('reyting.frontend.frogments.skeletonTable')
                                            @endif
                                        </ul>
                                    </dd>
                                </div>
                                <div class="inline-flex items-center justify-center w-full mb-3">
                                    <hr class=" h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700"
                                        style="width: 920px;">
                                    <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900 flex">
                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                            <path
                                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />

                                        </svg>

                                        <p class="ml-2 mr-2"> OPERATORLAR</p>

                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                            <path
                                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />

                                        </svg>
                                    </div>
                                </div>
                                <div class="w-md">
                                    <p class="text-gray-500 dark:text-gray-400">Moderatorga
                                        Operatorlarni birlashtirganizdan so'ng bu yerda ularning ism
                                        sharifi ko'rinadi!</p>

                                    <!-- Nested accordion -->
                                    <div id="accordion-nested-collapse-{{ $item->id }}" data-accordion="collapse"
                                        class="mt-4 mb-12 m-auto w-full">

                                        @foreach ($item->operator as $items)
                                        <h2 id="accordion-nested-collapse-heading-{{ $items->id }}">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-3 rounded-t-xl font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
                                                data-accordion-target="#accordion-nested-collapse-body-{{ $items->id }}"
                                                aria-expanded="false"
                                                aria-controls="accordion-nested-collapse-body-{{ $items->id }}">
                                                <tr
                                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td class="w-4 p-4">
                                                        <div class="flex  items-center">
                                                            №{{ $loop->iteration }}
                                                        </div>
                                                    </td>
                                                    <th scope="row"
                                                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">

                                                        <div class="ps-3 md:min-w-0 custom-min-width-lg">
                                                            <div class="text-base font-semibold">
                                                                {{ $items->oper_fish }}
                                                            </div>
                                                            {{-- <div class="font-normal text-gray-500">
                                                                {{ str_pad(substr($items->oper_slug_number, 0, -3),
                                                                strlen($items->oper_slug_number), '*', STR_PAD_RIGHT) }}
                                                            </div> --}}
                                                        </div>

                                                        <style>
                                                            @media (min-width: 1024px) {

                                                                /* lg breakpoint uchun */
                                                                .custom-min-width-lg {
                                                                    min-width: 500px;
                                                                }
                                                            }
                                                        </style>

                                                    </th>
                                                    <td class="px-6 py-4">
                                                        Ball: {{ $items->oper_custom_ball }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center">
                                                            @if ($items->oper_status)
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2">
                                                            </div>
                                                            <p class="hidden sm:block">Aktiv!</p>
                                                            @else
                                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2">
                                                            </div>
                                                            <p class="hidden sm:block">Aktiv emas!</p>
                                                            @endif
                                                        </div>
                                                    </td>

                                                </tr>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-nested-collapse-body-{{ $items->id }}" class="hidden mb-5"
                                            aria-labelledby="accordion-nested-collapse-heading-{{ $items->id }}">
                                            {{-- <div
                                                class="py-5 px-2     border border-b-0 border-gray-200 dark:border-gray-700">
                                                <p class="text-gray-500 dark:text-gray-400">
                                                <blockquote
                                                    class="p-4 my-4 border-s-4 text-md border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                                    <b>Mavzu:</b> {{ $items->oper_small_info }}
                                                </blockquote>


                                                </p>

                                                <div class="px-1 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                                    <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                        <ul role="list"
                                                            class="divide-y divide-gray-100 rounded-md border border-gray-200">

                                                            @if (count($items->files) > 0)
                                                            @foreach ($items->files as $files_or_urls)
                                                            @include('reyting.frontend.frogments.showProfessorFiles')
                                                            @endforeach
                                                            @else
                                                            <h1
                                                                class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">
                                                                Ma'lumotlar joylanmagan!</h1>
                                                            @include('reyting.frontend.frogments.skeletonTable')
                                                            @endif




                                                        </ul>
                                                    </dd>
                                                </div>


                                            </div> --}}
                                            <div
                                                class="px-4 pt-6 sm:grid sm:grid-cols-3 text-center w-5/6 m-auto sm:gap-2 sm:px-0">
                                                <dt class="text-md font-medium leading-6 pt-6 text-gray-900">Ilmiy
                                                    yo‘nalish mavzusi nom:
                                                </dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                                                    <blockquote
                                                        class="p-4 my-4 border-s-4 border-gray-300 bg-gray-50 dark:border-gray-500 dark:bg-gray-800">
                                                        <p
                                                            class="text-sm italic font-medium leading-relaxed text-gray-900 dark:text-white">
                                                            "{{ $items->oper_small_info }}"</p>
                                                    </blockquote>
                                                </dd>
                                            </div>


                                            <div
                                                class="px-4 pt-6 pb-6 sm:grid sm:grid-cols-3 text-center w-5/6 m-auto sm:gap-2 sm:px-0">
                                                <dt class="text-md font-medium leading-6 pt-4 text-gray-900">Ilmiy
                                                    yo‘nalish mavzusi
                                                    muommolari:</dt>
                                                <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">

                                                    <div class="p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                                                        role="alert">
                                                        <span class="font-medium">
                                                            @if($items->oper_small_info2)
                                                            {{ $items->oper_small_info2 }}
                                                            @else
                                                            Ilmiy yo‘nalish mavzusi muommolari yozilmagan!
                                                            @endif
                                                    </div>
                                                </dd>
                                            </div>

                                            <div class="px-1 py-6 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-0">
                                                <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                                    <ul role="list"
                                                        class="divide-y divide-gray-100 rounded-md border border-gray-200">

                                                        @if (count($items->files) > 0)
                                                        @foreach ($items->files as $files_or_urls)
                                                        @include('reyting.frontend.frogments.showProfessorFiles')
                                                        @endforeach
                                                        @else
                                                        <h1
                                                            class="text-center text-xl font-medium mb-4 mt-2 text-gray-400">
                                                            Ma'lumotlar joylanmagan!</h1>
                                                        @include('reyting.frontend.frogments.skeletonTable')
                                                        @endif




                                                    </ul>
                                                </dd>
                                            </div>


                                        </div>
                                        @endforeach


                                    </div>
                                    <div class="absolute px-4 -translate-x-1/2 bg-white left-1/2 dark:bg-gray-900 flex">
                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                            <path
                                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />

                                        </svg>

                                        <p class="ml-2 mr-2"> MODERATORLAR </p>

                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                            <path
                                                d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />

                                        </svg>
                                    </div>
                                    <!-- End: Nested accordion -->
                                </div>
                                <div class="inline-flex items-center justify-center w-full ">
                                    <hr class="w-full h-1 my-8 bg-gray-200 border-0 rounded dark:bg-gray-700">

                                </div>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection