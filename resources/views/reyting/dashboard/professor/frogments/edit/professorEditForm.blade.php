<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="container mx-auto">
                    <h1 class="text-2xl font-bold mb-6">Professor ma'lumotlarinio tahrirlash
                        sahifasi</h1>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-2 mt-4"
                            role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif --}}


                    <form action="{{ route('professors.update', ['professor' => $professor]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-5">
                            <label for="fish" class="block text-gray-600">Professor F.I.SH
                                to'liq yozing:</label>
                            <input type="text" name="fish"
                                value="{{ old('fish') ?? $professor->fish }}" id="fish"
                                class="border px-4 py-2 w-full" required>
                            @error('fish')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-600">Professor suratini
                                yuklash:</label>
                            <input type="file" name="image" id="image"
                                value="{{ old('image') }}"
                                class="form-control @error('image') is-invalid @enderror  accept="image/*"
                                onchange="previewImage(event)">

                            @error('image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <img id="image-preview" style="width: 150px; margin: auto;"
                            class="rounded-full" src="{{ url('/uploads') }}/{{ $professor->image }}"
                            alt="Image Preview" style="display: none;">
                        <div class="mb-4">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="1" name="status"
                                    class="hidden peer"
                                    {{ $professor->status == 1 ? 'checked' : '' }}>
                                <div
                                    class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600">
                                </div>
                                <span
                                    class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini
                                    belgilash</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="small_info" class="block text-gray-600">Professor haqida
                                qisqacha yozish:</label>
                            <textarea name="small_info" id="small_info" class="border px-4 py-2 w-full" rows="6">{{ old('small_info') ?? $professor->small_info }}</textarea>
                            @error('small_info')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-4 text-right">
                            <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4">Yangilash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>