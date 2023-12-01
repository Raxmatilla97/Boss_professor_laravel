<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-6">Professorga moderator qo'shish</h1>
                <form action="{{ route('moderator.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="professor_id" value="{{ $professor->id }}">
                    <div class="mb-5">
                        <label for="moder_fish" class="block text-gray-600">Moderator
                            F.I.SH:</label>
                        <input type="text" name="moder_fish" value="{{ old('moder_fish') }}"
                            id="moder_fish" class="border px-4 py-2 w-full" required>
                        @error('moder_fish')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="moder_small_info" class="block text-gray-600">Moderator mavzusi
                            haqida:</label>
                        <textarea name="moder_small_info" id="moder_small_info" class="border px-4 py-2 w-full" rows="4">{{ old('moder_small_info') }}</textarea>
                        @error('moder_small_info')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" value="1" name="moder_status"
                                class="hidden peer"
                                {{ old('moder_status') == 1 ? 'checked' : '' }}>
                            <div
                                class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300  rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all  peer-checked:bg-blue-600">
                            </div>
                            <span
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Statusini
                                belgilash</span>
                        </label>
                    </div>

                    <div class="mb-4 text-right">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4">Moderator
                            yaratish</button>
                    </div>
                </form>
            </div>


        </div>

    </div>
</div>