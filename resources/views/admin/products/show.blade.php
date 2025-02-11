@extends('layouts.admin')

@section('title', 'Detail Produk')

@section('header', 'Detail Produk')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <h1 class="text-3xl font-bold mb-6">{{ $shoe->name }}</h1>

    <!-- Card Detail Produk -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Gambar Produk -->
            <div class="flex justify-center items-center">
                <img src="{{ $shoe->image ? asset('storage/' . $shoe->image) : asset('images/default-shoe.jpg') }}" 
                     alt="{{ $shoe->name }}" 
                     class="w-full h-auto max-w-sm rounded-md shadow">
            </div>

            <!-- Informasi Produk -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Informasi Produk</h2>
                <p class="text-gray-700 mb-2"><strong>Kategori:</strong> {{ $shoe->category->name ?? 'Tidak ada kategori' }}</p>
                <p class="text-gray-700 mb-2"><strong>Harga:</strong> Rp {{ number_format($shoe->price, 0, ',', '.') }}</p>
                <p class="text-gray-700 mb-2"><strong>Stok:</strong> {{ $shoe->stock }}</p>
                <p class="text-gray-700 mb-4"><strong>Deskripsi:</strong> {{ $shoe->description ?? 'Tidak ada deskripsi' }}</p>

                <!-- Tombol Aksi -->
                <div class="mt-4 flex space-x-4">
                    <a href="{{ route('admin.products.edit', $shoe->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                        Edit Produk
                    </a>
                    <form action="{{ route('admin.products.destroy', $shoe->id) }}" method="POST" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">
                            Hapus Produk
                        </button>
                    </form>
                    <a href="{{ route('admin.products.index') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
