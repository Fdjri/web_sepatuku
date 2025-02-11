@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h2>

    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200">
                <th class="py-2 px-4">No</th>
                <th class="py-2 px-4">Produk</th>
                <th class="py-2 px-4">Jumlah</th>
                <th class="py-2 px-4">Harga</th>
                <th class="py-2 px-4">Total Harga</th>
                <th class="py-2 px-4">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @php
                    $orderTotal = 0; // Inisialisasi total pesanan
                @endphp
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td class="py-2 px-4">{{ $loop->parent->iteration }}</td>
                        <td class="py-2 px-4">{{ $orderItem->shoe->name }}</td>
                        <td class="py-2 px-4">{{ $orderItem->quantity }}</td>
                        <td class="py-2 px-4">Rp{{ number_format($orderItem->price, 0, ',', '.') }}</td>
                        <td class="py-2 px-4">Rp{{ number_format($orderItem->price * $orderItem->quantity, 0, ',', '.') }}</td>
                        <td class="py-2 px-4">{{ ucfirst($order->status) }}</td>
                    </tr>
                    @php
                        // Menambahkan total harga pesanan
                        $orderTotal += $orderItem->price * $orderItem->quantity;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4" class="py-2 px-4 text-right font-bold">Total yang harus dibayar:</td>
                    <td class="py-2 px-4 text-bold">Rp{{ number_format($orderTotal, 0, ',', '.') }}</td>
                    <td class="py-2 px-4"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
