@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($products as $product)
            <div class="bg-gray-100 p-4 shadow rounded">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover rounded mb-2">
                <h2 class="text-lg font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-700">Kategori: {{ $product->category->name ?? 'Tidak ada' }}</p>
                <p class="text-gray-700">Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                <p class="text-gray-700">Stok: {{ $product->stock }}</p>
                <form action="{{ route('user.orders', $product->id) }}" method="POST" class="mt-2">
                    @csrf
                    <input type="number" name="quantity" class="border p-1 w-full mb-2" placeholder="Jumlah" min="1" max="{{ $product->stock }}" required>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah ke Pesanan
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
