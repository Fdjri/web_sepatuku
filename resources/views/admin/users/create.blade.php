@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pengguna</h1>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <label for="name" class="block">Nama</label>
    <input type="text" id="name" name="name" class="border border-gray-300 p-2 w-full mb-4" required>

    <label for="email" class="block">Email</label>
    <input type="email" id="email" name="email" class="border border-gray-300 p-2 w-full mb-4" required>

    <label for="password" class="block">Password</label>
    <input type="password" id="password" name="password" class="border border-gray-300 p-2 w-full mb-4" required>

    <label for="password_confirmation" class="block">Konfirmasi Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="border border-gray-300 p-2 w-full mb-4" required>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
