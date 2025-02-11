@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    <!-- Card Statistik Jumlah User -->
    <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Pengguna</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $userCount }}</p>
        </div>
        <div class="text-blue-500 text-4xl">
            <i class="fas fa-users"></i> <!-- Gunakan ikon dari FontAwesome atau lainnya -->
        </div>
    </div>

    <!-- Card Statistik Jumlah Produk -->
    <div class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Produk</h3>
            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $productCount }}</p>
        </div>
        <div class="text-green-500 text-4xl">
            <i class="fas fa-boxes"></i> <!-- Gunakan ikon dari FontAwesome atau lainnya -->
        </div>
    </div>
</div>
@endsection
