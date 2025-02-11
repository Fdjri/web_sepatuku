@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Tambah Sepatu Baru</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm">Nama Sepatu</label>
                <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm">Harga</label>
                <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-sm">Stok</label>
                <input type="number" name="stock" id="stock" class="w-full px-4 py-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm">Deskripsi</label>
                <textarea name="description" id="description" class="w-full px-4 py-2 border rounded"></textarea>
            </div>
            <div class="mb-4">
                <label for="category_id" class="block text-sm">Kategori</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm">Gambar</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded">
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
@endsection
