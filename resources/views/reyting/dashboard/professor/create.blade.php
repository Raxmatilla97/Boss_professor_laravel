<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Professorlar') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto">
                        <h1 class="text-2xl font-bold mb-4">Add New Fish</h1>
                
                        <form action="{{ route('professors.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="fish" class="block text-gray-600">Fish Name:</label>
                                <input type="text" name="fish" id="fish" class="border px-4 py-2 w-full" required>
                            </div>
                
                            {{-- ... Add other form fields based on your model ... --}}
                
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4">Add Fish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
