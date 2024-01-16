<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Kordinator ma'lumotlarinio tahrirlash va Moderator va Operatorlarni ko'rish sahifasi ") }}
        </h2>
    </x-slot>

    {{-- Sahifada yangilanish qilganda o'ng tarafda chiqadigan bildirishnoma --}}
    @include('reyting.dashboard.professor.frogments.edit.toaster')



    <div class="container mx-auto my-8" style="max-width: 1300px;">
        <div class="border rounded">
            <ul class="flex">
                <li class="mr-1">
                    <a href="#prof"
                        class="block py-2 px-4 bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 focus:outline-none focus:bg-gray-300 tab-link">Professor
                        haqida ma'lumotlar</a>
                </li>
                <li class="mr-1">
                    <a href="#moder"
                        class="block py-2 px-4 bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 focus:outline-none focus:bg-gray-300 tab-link">
                        Moderatorlar</a>
                </li>
                <li class="mr-1">
                    <a href="#oper"
                        class="block py-2 px-4 bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300 focus:outline-none focus:bg-gray-300 tab-link">Operatorlar</a>
                </li>
                <!-- Boshqa tablar uchun ham shu tarzda linklar qo'shing -->
            </ul>
            <div class="p-4">
                <!-- Tab 1 kontenti -->
                <div id="prof" class="tab-content">

                   {{-- Professor ma'lumotlarini tahrirlash formasi fragmenti --}}
                    @include('reyting.dashboard.professor.frogments.edit.professorEditForm')
                </div>

                <!-- Tab 2 kontenti -->
                <div id="moder" class="hidden tab-content">
                    {{-- Sahifada yangi moderator yaratish formasi frogmenti --}}
                    {{-- @include('reyting.dashboard.professor.frogments.edit.moderatorCreateForm')               --}}

                   
                   
                    {{-- Sahifada moderatorlar ro'yxatini chiqarish frogmenti --}}
                    @include('reyting.dashboard.professor.frogments.edit.moderatorsList')

                    <!-- Boshqa tablarning kontentlarini ham shu tarzda qo'shing -->
                </div>

                <!-- Tab 3 kontenti -->
                <div id="oper" class="hidden tab-content">
                    {{-- Sahifada moderatorlar ro'yxatini chiqarish frogmenti --}}
                    {{-- @include('reyting.dashboard.professor.frogments.edit.OperatorCreateForm') --}}

                     {{-- Sahifada moderatorlar ro'yxatini chiqarish frogmenti --}}
                     @include('reyting.dashboard.professor.frogments.edit.OperatorList')
                </div>
                </div>

            </div>
        </div>


        {{-- Sahifada yangilanish qilganda o'ng tarafda chiqadigan bildirishnoma --}}
        @include('reyting.dashboard.professor.frogments.edit.scripts')

</x-app-layout>
