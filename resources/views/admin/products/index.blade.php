@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Header dan Tombol Tambah -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-3xl font-bold mb-6">Daftar Sepatu</h1>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 mb-6 inline-block">
             Tambah Sepatu
        </a>
    </div>

    <!-- Card Container -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <!-- Tabel -->
                <table class="min-w-full table-auto bg-white shadow-md rounded-md border-collapse">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="py-3 px-6 text-left">#</th>
                            <th class="py-3 px-6 text-left">Nama Sepatu</th>
                            <th class="py-3 px-6 text-left">Kategori</th>
                            <th class="py-3 px-6 text-left">Harga</th>
                            <th class="py-3 px-6 text-left">Stok</th>
                            <th class="py-3 px-6 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shoes as $index => $shoe)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="py-3 px-6">{{ $index + 1 }}</td>
                                <td class="py-3 px-6">{{ $shoe->name }}</td>
                                <td class="py-3 px-6">{{ $shoe->category->name ?? 'Tidak ada kategori' }}</td>
                                <td class="py-3 px-6">Rp {{ number_format($shoe->price, 0, ',', '.') }}</td>
                                <td class="py-3 px-6">{{ $shoe->stock }}</td>
                                <td class="py-3 px-6 text-center space-x-2">
                                    <!-- Tombol View -->
                                   <a href="{{ route('admin.products.show', $shoe->id) }}" 
                                       class="text-blue-600 hover:text-blue-800">
                                        Detail
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.products.edit', $shoe->id) }}" 
                                       class="text-yellow-600 hover:text-yellow-800">
                                        Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.products.destroy', $shoe->id) }}" 
                                          method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" 
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus sepatu ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Notifikasi Jika Tidak Ada Data -->
            @if($shoes->isEmpty())
                <div class="alert alert-info text-center mt-4">
                    <strong>Tidak ada sepatu yang tersedia saat ini.</strong>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
