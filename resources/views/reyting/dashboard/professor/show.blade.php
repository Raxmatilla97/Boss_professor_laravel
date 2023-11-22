<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Professor: {{ $professor->fish }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ Storage::url($professor->image) }}" alt="{{ $professor->fish }}'s image">
                    <p>Status: {{ $professor->status ? 'Active' : 'Not Active' }}</p>
                    <p>Custom Ball: {{ $professor->custom_ball }}</p>
                    <p>Small Info: {{ $professor->small_info }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>