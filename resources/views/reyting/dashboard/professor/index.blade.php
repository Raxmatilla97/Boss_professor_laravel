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
                        <h1 class="text-2xl font-bold mb-4">Fish List</h1>
                
                        <a href="{{ route('professors.create') }}" class="bg-blue-500 text-white py-2 px-4 mb-4 inline-block">Add Fish</a>
                
                        <table class="w-full border">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Fish</th>
                                    <th class="border px-4 py-2">Image</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Custom Ball</th>
                                    <th class="border px-4 py-2">Small Info</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professors as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->id }}</td>
                                        <td class="border px-4 py-2">{{ $item->fish }}</td>
                                        <td class="border px-4 py-2">{{ $item->image }}</td>
                                        <td class="border px-4 py-2">{{ $item->status ? 'Active' : 'Inactive' }}</td>
                                        <td class="border px-4 py-2">{{ $item->custom_ball }}</td>
                                        <td class="border px-4 py-2">{{ $item->small_info }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('professors.edit', $item->id) }}" class="text-blue-500">Edit</a>
                                            <form action="{{ route('professors.destroy', $item->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
