<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Professorlar') }}
        </h2>
    </x-slot>

    @if(session('toaster'))

    <div id="toast-top-left" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500    " role="alert">
        <div id="toast"  class="border border-solid border-red-500 border-t-3 border-b-3 border-l-2 border-r-2 shadow-red fixed top-6 right-6 mt-20 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg ">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toaster')[1] }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 " onclick="dismissToast()" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>
    
    <style>
        .shadow-green {
        box-shadow: 0 4px 6px -1px rgba(0, 255, 0, 0.1), 0 2px 4px -1px rgba(0, 255, 0, 0.06);
        }       
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                dismissToast();
            }, 5000); // Avtomatik yoqilish uchun 5 sekund kutamiz
        });

        function dismissToast() {
            var toast = document.getElementById('toast');
            toast.style.display = 'none';
        }
    </script>
@endif
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-4">Professorlar ro'yxati</h1>
                
                        <a href="{{ route('professors.create') }}" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Yangi professor qo'shish</a>
                
                        <table class="w-full border">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Professor F.I.SH</th>
                                    <th class="border px-4 py-2">Surati</th>
                                    <th class="border px-4 py-2" style="width: 130px;">Status</th>
                                    <th class="border px-4 py-2" style="width: 150px;">Umumiy ballari</th>                                  
                                    <th class="border px-4 py-2" style="width: 20px;">Amaliyot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professors as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->id }}</td>
                                        <td class="border px-4 py-2">{{ $item->fish }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <img style="width: 100px; border-radius: 50%" src="{{ url('/uploads') }}/{{ $item->image }}" alt="" class="d-block mx-auto rounded">
                                        </td>
                                        
                                        <td class="border px-4 py-2 text-center">
                                            @if($item->status == 1)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-blue-400">Aktiv!</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded border border-red-400">Aktiv emas!</span>
                                            @endif
                                            </td>
                                        <td class="border px-4 py-2">{{ $item->custom_ball }}</td>
                                       
                                        <td class="border px-4 py-2 text-cente">
                                            <a href="{{ route('professors.edit', $item->slug_number) }}"><span class="bg-indigo-100 text-indigo-800 text-md font-medium me-2 px-2.5 py-0.5 rounded border border-indigo-400">Tahrirlash</span></a>
                                            <div x-data="{ showModal: false }">
                                                <!-- Modal Trigger Button -->
                                                <button data-modal-trigger="popup-modal-{{$item->id}}" @click="showModal = true" class="text-red-500">O'chirish</button>
                                            
                                                <!-- Modal -->
                                                <div x-show="showModal" @click.away="showModal = true" class="fixed inset-0 overflow-y-auto">                                                   
                                                    
                                                    <div id="popup-modal-{{$item->id}}" class="relative z-10 hidden"  aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                                    
                                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                                    
                                                        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                        
                                                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                            <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                <div class="sm:flex sm:items-start">
                                                                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">O'chirishni tasdiqlang!</h3>
                                                                    <div class="mt-2">
                                                                    <p class="text-sm text-gray-500">Ushbu professorni o'chirishni istaysizmi? Agarda ha bo'lsa unutmang o'chirilgan ma'lumotlar qayta tiklanmaydi!</p>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                <form action="{{ route('professors.destroy', $item->slug_number) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')                                                                   
                                                                    <button type="butsubmitton" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Ha, o'chirish</button>
                                                                </form>
                                                               
                                                                <button  @click="showModal = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Yo'q, orqaga qaytish</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                   

                                                </div>

                                                
                                            </div>


                                          
                                        </td>
                                    </tr>
                                @endforeach

                                <script>
                                    document.addEventListener('DOMContentLoaded', function () {
                                        var modalTriggers = document.querySelectorAll('[data-modal-trigger]');
                                
                                        modalTriggers.forEach(function (trigger) {
                                            trigger.addEventListener('click', function () {
                                                var modalId = this.getAttribute('data-modal-trigger');
                                                var modal = document.getElementById(modalId);
                                
                                                if (modal) {
                                                    modal.classList.remove('hidden'); // O'chirish uchun 'hidden' klassini olib tashlash
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </tbody>
                        </table>
                    </div>
                    {{ $professors->links()}}
                </div>
            </div>
        </div>
    </div>
    
   
    

</x-app-layout>
