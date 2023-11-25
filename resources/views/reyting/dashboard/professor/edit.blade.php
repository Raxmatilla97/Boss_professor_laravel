<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Professorlar') }}
        </h2>
    </x-slot>
    @if(session('toaster'))

        <div id="toast-top-left" class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500    " role="alert">
            <div id="toast"  class="border border-solid border-green-500 border-t-3 border-b-3 border-l-2 border-r-2 shadow-green fixed top-6 right-6 mt-20 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
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
                        <h1 class="text-2xl font-bold mb-6">Professor ma'lumotlarinio tahrirlash sahifasi</h1>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-2 mt-4" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif --}}
                
                   
                        <form action="{{ route('professors.update', ['professor' => $professor]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') 
                            <div class="mb-5">
                                <label for="fish" class="block text-gray-600">Professor F.I.SH to'liq yozing:</label>
                                <input type="text" name="fish" value="{{ old('fish') ?? $professor->fish }}" id="fish" class="border px-4 py-2 w-full" required>
                                @error('fish')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-gray-600">Professor suratini yuklash:</label>
                                <input 
                                    type="file" 
                                    name="image" 
                                    id="image"
                                    value="{{ old('image')}}"
                                    class="form-control @error('image') is-invalid @enderror  accept="image/*" onchange="previewImage(event)">
                                
                                @error('image')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full" src="{{url('/uploads')}}/{{$professor->image}}" alt="Image Preview" style="display: none;">
                            <div class="mb-4">                              
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="1" name="status" class="hidden peer" {{ $professor->status == 1 ? 'checked' : '' }}>
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini belgilash</span>
                                  </label>
                            </div>

                            <div class="mb-4">
                                <label for="small_info" class="block text-gray-600">Professor haqida qisqacha yozish:</label>
                                <textarea name="small_info" id="small_info" class="border px-4 py-2 w-full" rows="6" >{{old('small_info') ?? $professor->small_info}}</textarea>
                                @error('small_info')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>                
                       
                
                            <div class="mb-4 text-right">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Yaratish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
    
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                    document.getElementById('image-preview').src = e.target.result;
                    document.getElementById('image-preview').style.display = 'block';
                }
    
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
