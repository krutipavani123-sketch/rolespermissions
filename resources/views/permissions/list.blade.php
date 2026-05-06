<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

<x-message></x-message>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                  
            </div>
        </div>
    </div>
</x-app-layout>



<table class="w-full">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->created_at->format('d M, Y') }}</td>

            <td>
                <a href="#" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                <a href="#" class="bg-red-500 text-white px-3 py-1 rounded">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>