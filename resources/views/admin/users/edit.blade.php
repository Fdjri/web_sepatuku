@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Pengguna</h1>

@if ($errors->any())
    <div class="bg-red-500 text-white p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name" class="block">Nama</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
           class="border border-gray-300 p-2 w-full mb-4" required>

    <label for="email" class="block">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
           class="border border-gray-300 p-2 w-full mb-4" required>

    <label for="password" class="block">Password Baru (Opsional)</label>
    <input type="password" id="password" name="password" 
           class="border border-gray-300 p-2 w-full mb-4">

    <label for="password_confirmation" class="block">Konfirmasi Password Baru</label>
    <input type="password" id="password_confirmation" name="password_confirmation" 
           class="border border-gray-300 p-2 w-full mb-4">

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
    <a href="{{ route('admin.users.index') }}" class="ml-4 text-blue-600 underline">Batal</a>
</form>
@endsection
