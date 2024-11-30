@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl">Manage Users</h1>
    {{-- <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a> --}}
    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
        <thead>
            <tr>
                <th class="px-6 py-3 text-start text-xl font-medium text-gray-500 uppercase dark:text-neutral-500">ID</th>
                <th class="px-6 py-3 text-start text-xl font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                <th class="px-6 py-3 text-start text-xl font-medium text-gray-500 uppercase dark:text-neutral-500">Email</th>
                <th class="px-6 py-3 text-start text-xl font-medium text-gray-500 uppercase dark:text-neutral-500">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="border-3 border-black">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

</div>
@endsection
