<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Managers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">
                    <!-- Create Button -->
                    <a href="{{ route('admin.manager.create') }}"
                       class="text-black font-bold py-2 m-2 px-4 rounded shadow-sm transition-all">
                        Create
                    </a>

                    <!-- Table -->
                    <table class="table-auto w-full border-collapse border border-gray-200">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">email</th>
                            <th class="border px-4 py-2">role</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user -> getRoleNames()->implode(', ')  }}</td>

                                <td>

                                    <a class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded shadow-sm transition-all" href="{{ route('manager.edit', $user->id) }}"> edit </a>
                                    <a class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded shadow-sm transition-all" href="{{ route('manager.delete', $user->id) }}"> delete </a>

                                </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
