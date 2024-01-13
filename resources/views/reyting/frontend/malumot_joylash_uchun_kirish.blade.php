@extends('layouts.frontend')
@section('content')
    <!-- component -->
    @push('styles')
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endpush



    <div class="relative min-h-screen flex items-center justify-center bg-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
        style="background-image: url({{ asset('assets/thumb__1_0_0_0_auto.jpg') }});">
        <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
        <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col ">
                    <div class="flex flex-col sm:flex-row items-center">
                        <h2 class="font-semibold text-lg mr-auto">Reyting uchun ma'lumot joylash</h2>
                        <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
                    </div>
                    <div class="mt-5">
                        <div class="form">
                            @if (session('error'))
                                <div class="bg-red-500 text-white p-4 mb-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('site.kirishUchunSlugQidirish') }}" method="POST">
                                @csrf
                              
                                <div class="mb-3 space-y-2 w-full text-xs">
                                    <label class=" font-semibold text-gray-600 py-2">Ma'lumot joylash uchun sizga berilgan
                                        kodni kiriting</label>
                                    <div class="flex flex-wrap items-stretch w-full mb-4 relative">
                                        <div class="flex">
                                            <span
                                                class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark text-sm w-12 h-10 bg-blue-300 justify-center items-center  text-xl rounded-lg text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" name="code" required
                                            class="flex-shrink flex-grow flex-auto leading-normal w-px flex-1 border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow"
                                            placeholder="aBc123.......">
                                    </div>
                                </div>


                                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                    <a href="{{ '/' }}"><button type="button"
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
    @endsection
