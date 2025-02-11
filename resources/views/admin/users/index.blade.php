@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>

@if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Pengguna</a>

<table class="table-auto w-full mt-4 border-collapse border border-gray-300">
    <thead>
        <tr>
            <th class="border border-gray-300 px-4 py-2">#</th>
            <th class="border border-gray-300 px-4 py-2">Nama</th>
            <th class="border border-gray-300 px-4 py-2">Email</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
            <td class="border border-gray-300 px-4 py-2">
                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500">Edit</a> |
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
