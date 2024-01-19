<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistika sahifasi') }}
        </h2>
    </x-slot>

    <div class="py-12 px-2">
        <div class="max-w-7xl mx-auto sm:px- lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


              <div class="p-6 text-gray-900 grid  md:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                <div class="mx-2">
                    @include('reyting.dashboard.frogments.birinchi-chart')
                </div>
                <div class="mx-2">
                    @include('reyting.dashboard.frogments.ikkinchi-chart')
                </div>
                <div class="mx-2">
                    @include('reyting.dashboard.frogments.uchunchi-chart')
                </div>                   
            </div>
            
            

                <div class="mx-5 my-3 ">
                    <div id="alert-additional-content-1"
                        class="p-4 mx-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Bu statistikada Kordinatorlar qaysi oyda qancha ball
                                to'plaganligini ko'rish mumkin</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Ballar umumiy shakilda hisoblangan, unda Kordinator yuborgan murojaatlardan tashqari
                            kordinatorga tegishli Moderatorlar va Operatorlar ballari ham qo'shib hisoblangan.
                        </div>

                    </div>
                    @include('reyting.dashboard.frogments.tortinchi-chart')
                </div>

                <div class="mx-5  my-3">
                    <div id="alert-additional-content-1"
                        class="p-4 mb-4 mx-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Bu statistikada Moderatorlar qaysi oyda qancha ball
                                to'plaganligini ko'rish mumkin</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Ballar umumiy shakilda hisoblangan, unda Moderatorlar yuborgan murojaatlardan tashqari
                            moderatorlarga tegishli Operatorlar ballari ham qo'shib hisoblangan.
                        </div>

                    </div>
                    @include('reyting.dashboard.frogments.beshinchi-chart')
                </div>

                <div class="mx-5  my-3">
                    <div id="alert-additional-content-1"
                        class="p-4 mb-4 mx-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
                        role="alert">
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <h3 class="text-lg font-medium">Bu statistikada Operatorlar qaysi oyda qancha ball
                                to'plaganligini ko'rish mumkin</h3>
                        </div>
                        <div class="mt-2 mb-4 text-sm">
                            Ballar umumiy shakilda hisoblangan, unda Operatorlar yuborgan murojaatlarga tegishli ballar
                            qo'shib hisoblangan.
                        </div>

                    </div>
                    @include('reyting.dashboard.frogments.oltinchi-chart')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
