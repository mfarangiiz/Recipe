<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <!-- Create Button -->

                    @role('admin')
                    <a href="{{ route('admin.recipes.create') }}"
                       class="text-black font-bold py-2 m-2 px-4 rounded shadow-sm transition-all">
                        Create
                    </a>
                    @endrole
                    
                    <!-- Table -->
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Owner</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Ingredients</th>
                            <th class="border px-4 py-2">Instructions</th>
                            <th class="border px-4 py-2">photo</th>
                            <th class="border px-4 py-2">status</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recipes as $recipe)
                            <tr>
                                <td class="border px-4 py-2">{{ $recipe->id }}</td>
                                <td class="border px-4 py-2">{{ $recipe->user }}</td>
                                <td class="border px-4 py-2">{{ $recipe->name }}</td>
                                <td class="border px-4 py-2">{{ $recipe->ingredients }}</td>
                                <td class="border px-4 py-2">{{ $recipe->instructions }}</td>
                                <td class="border px-4 py-2"><img src="{{ asset('storage/' . $recipe->image) }}" width="70px" alt="Card Image"></td>
                                <td class="border px-4 py-2">{{ ($recipe->status != 1)?"❌" : "✅" }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex space-x-2 justify-center">
                                        <a href="{{ route('recipes.show', $recipe->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded shadow-sm transition-all">
                                            ✔️
                                        </a>

                                        <a href="{{ route('recipes.edit', $recipe->id) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded shadow-sm transition-all">
                                            ✏️
                                        </a>

                                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-bold py-1 px-3 rounded shadow-sm transition-all">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
