<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="container mx-auto">

                    <h1 class="text-2xl font-bold mb-6">Kordinator ma'lumotlarinio tahrirlash
                        sahifasi</h1>
                    {{--
                    <span
                        class="bg-blue-100 text-blue-800 text-md font-medium me-2  px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">ID:
                        {{$professor->slug_number}}</span>
                    --}}




                    <div class="flex items-center">
                        <span
                            class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            ID: {{$professor->slug_number}}
                        </span>

                        <!-- Copy Button -->
                        <button class="bg-gray-300 hover:bg-gray-400 rounded p-1 cursor-pointer"
                            data-clipboard-text="{{$professor->slug_number}}" onclick="copyToClipboard(this)">
                            <img src="{{asset('assets/copy.png')}}" alt="Copy" class="h-5 w-5">
                        </button>
                    </div>
                </div>

                <script>
                    function copyToClipboard(element) {
                    const textToCopy = element.getAttribute('data-clipboard-text');
                    if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(textToCopy).then(function() {
                            showToast();
                        }, function(err) {
                            console.error('Matnni nusxalashda xato yuz berdi: ', err);
                        });
                    } else {
                        const textArea = document.createElement('textarea');
                        textArea.value = textToCopy;
                        textArea.style.position = 'fixed';
                        textArea.style.opacity = '0';
                        document.body.appendChild(textArea);
                        textArea.focus();
                        textArea.select();

                        try {
                            const successful = document.execCommand('copy');
                            if (successful) {
                                showToast();
                            } else {
                                console.error('Fallback: Matnni nusxalash buyrug\'i muvaffaqiyatsiz bo\'ldi');
                            }
                        } catch (err) {
                            console.error('Fallback: Afsuski, matnni nusxalab bo\'lmadi', err);
                        }

                        document.body.removeChild(textArea);
                    }
                }

                function showToast() {
                    const toast = document.getElementById('toast');
                    toast.style.display = 'flex';
                    setTimeout(function () {
                        toast.style.display = 'none';
                    }, 3000);
                }
                </script>



                <div id="toast"
                    class="hidden fixed top-5 right-5 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 z-50"
                    role="alert">
                    <div
                        class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                    </div>
                    <div class="ms-3 text-sm font-normal">Kordinator ID raqami nusxalandi!</div>


                </div>



                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show mb-2 mt-4" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('professors.update', ['professor' => $professor]) }}" method="POST" class="mt-5"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-5">
                        <label for="fish" class="block text-gray-600">Kordinator F.I.SH
                            to'liq yozing:</label>
                        <input type="text" name="fish" value="{{ old('fish') ?? $professor->fish }}" id="fish"
                            class="border px-4 py-2 w-full" required>
                        @error('fish')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-600">Kordinator suratini
                            yuklash:</label>
                        <input type="file" name="image" id="image" value="{{ old('image') }}"
                            class="form-control @error('image') is-invalid @enderror  accept=" image/*"
                            onchange="previewImage(event)">

                        @error('image')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <img id="image-preview" style="width: 150px; margin: auto;" class="rounded-full"
                        src="{{ url('/uploads/professor_images') }}/{{ $professor->image }}" alt="Image Preview"
                        style="display: none;">
                    <div class="mb-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="1" name="status" class="hidden peer" {{ $professor->status
                            == 1 ? 'checked' : '' }}>
                            <div
                                class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600">
                            </div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini
                                belgilash</span>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label for="small_info" class="block text-gray-600">Kordinator haqida
                            qisqacha yozish:</label>
                        <textarea name="small_info" id="small_info" class="border px-4 py-2 w-full"
                            rows="6">{{ old('small_info') ?? $professor->small_info }}</textarea>
                        @error('small_info')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-4 text-right">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4">Yangilash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>