@extends('layouts.app')

@section('content')
<div class="container ml-12">
    <h1 class="text-3xl">Manage Users</h1>
    {{-- <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a> --}}
    <div class="max-w-full text-lg text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-8">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 border-collapse">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">ID</th>
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Email</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-red-500 ml-4" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    
    
            </tbody>
        </table>
    
    </div>

</div>
@endsection
