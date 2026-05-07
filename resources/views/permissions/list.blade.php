 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.3/dist/bootstrap-table.min.css">


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.27.3/dist/bootstrap-table.min.js"></script>

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
                  
<table id="table" class="w-full">

    <thead class="bg-gray-50">
        <tr class="border-b">
            <th class="px-6 py-3 text-left" width="60">No</th>
            <th class="px-6 py-3 text-left">Name</th>
            <th class="px-6 py-3 text-left">Created</th>
            <th class="px-6 py-3 text-left">Action</th>
        </tr>
    </thead>

    <tbody class="bg-white">
        @foreach($permissions as $permission)
        <tr>
            <td class="px-6 py-3 text-left">{{ $permission->id }}</td>
            <td class="px-6 py-3 text-left">{{ $permission->name }}</td>
            <td class="px-6 py-3 text-left">{{ $permission->created_at->format('d M, Y') }}</td>

            <td class="px-6 py-3 text-left">

                <a href="{{ route('edit', $permission->id) }}">
    <i class="bi bi-pencil-square"></i>
</a>

                <a href="#" ><i class="bi bi-trash2-fill"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="my-3">
{{ $permissions->links() }}
</div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>


{{-- <table id="table"
    class="table table-bordered w-full"
    data-toggle="table"
    data-search="true"
    data-pagination="true"
    data-pagination-server="true"
    data-page-list="[5,10,25,50,All]"></table> --}}