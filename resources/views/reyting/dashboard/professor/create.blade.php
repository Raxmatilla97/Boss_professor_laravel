<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kordinator yaratish sahifasi') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-6">Yangi kordinator qo'shish sahifasi</h1>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-2 mt-4" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                
                        <form action="{{ route('professors.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-5">
                                <label for="fish" class="block text-gray-600">Kordinator F.I.SH to'liq yozing:</label>
                                <input type="text" name="fish" value="{{ old('fish')}}" id="fish" class="border px-4 py-2 w-full" required>
                                @error('fish')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-gray-600">Kordinator suratini yuklash:</label>
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
                            <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full" src="https://cspi.uz/storage/app/media/2023/avgust/i.webp" alt="Image Preview" style="display: none;">
                            <div class="mb-4">                              
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" value="1" name="status" class="hidden peer" {{ old('status') == 1 ? 'checked' : '' }}>
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600"></div>
                                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini belgilash</span>
                                  </label>
                            </div>

                            <div class="mb-4">
                                <label for="small_info" class="block text-gray-600">Kordinator mavzusi haqida:</label>
                                <textarea name="small_info" id="small_info" class="border px-4 py-2 w-full" rows="6" >{{old('small_info')}}</textarea>
                                @error('small_info')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>         

                            <div class="mb-4">
                                <label for="small_info2" class="block text-gray-600">Kordinator mavzusining muammolari:</label>
                                <textarea name="small_info2" id="small_info2" class="border px-4 py-2 w-full" rows="6" >{{old('small_info2')}}</textarea>
                                @error('small_info2')
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
