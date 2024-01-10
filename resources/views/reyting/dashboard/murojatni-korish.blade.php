<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Kelib tushgan murojaatni ko'rish") }}
        </h2>

    </x-slot>

    <div class="py-1 mt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Operator ma'lumotlarini tahrirlash</h1>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
    
                       <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full"
                                    src="{{$information->surat}}" alt="Image Preview"
                                    style="display: none;">
    
                        <div class="mb-5">
                            <label for="oper_fish" class="block text-gray-600">Moderator
                                F.I.SH:</label>
                            <input type="text" name="oper_fish" value="" id="moder_fish"
                                class="border px-4 py-2 w-full" required>
                            
                        </div>
    
                        <div class="mb-4">
                            <label for="oper_small_info" class="block text-gray-600">Moderator mavzusi
                                haqida:</label>
                            <textarea name="oper_small_info" id="oper_small_info" class="border px-4 py-2 w-full" rows="4"></textarea>
                            
                        </div>                  
    
                        <div class="mb-4 mt-6 text-right flex justify-between">
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"  type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-small rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">O'chirish</button>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4">Operatorni tahrirlash</button>
                        </div>
                    </form>
                </div>
    
    
            </div>
            

        </div>
      

    </div>

</x-app-layout>
