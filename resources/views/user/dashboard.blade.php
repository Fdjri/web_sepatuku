@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-gray-500">Lihat koleksi sepatu terbaru kami!</p>
    </div>

    <!-- List Produk -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
        <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transform transition duration-300 ease-in-out">
            <!-- Gambar Produk -->
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">

            <!-- Informasi Produk -->
            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $product->description }}</p>
                <p class="text-indigo-600 font-bold text-lg mt-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            </div>

            <!-- Tombol Pesan -->
            <div class="p-4 border-t border-gray-200 flex justify-between items-center">
                <form action="{{ route('user.order.add', $product->id) }}" method="POST" class="flex items-center">
                    @csrf
                    <input type="number" name="quantity" min="1" max="{{ $product->stock }}" value="1" class="w-20 p-2 border rounded-md mr-2" />
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Pesan
                    </button>
                </form>
                <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Footer -->
    <footer class="mt-8 text-center text-sm text-gray-500">
        <p>© 2024 SepaTUKU. All rights reserved.</p>
    </footer>
@endsection
