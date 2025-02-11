@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900">Order Details</h1>
    <div class="mt-4">
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>User:</strong> {{ $order->user->name }}</p>

        <h3 class="mt-4 text-lg font-semibold">Order Items</h3>
        <table class="min-w-full mt-2 border border-gray-300">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">Shoe</th>
                    <th class="px-4 py-2 border">Quantity</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td class="px-4 py-2 border">{{ $orderItem->shoe->name }}</td>
                        <td class="px-4 py-2 border">{{ $orderItem->quantity }}</td>
                        <td class="px-4 py-2 border">{{ $orderItem->price }}</td>
                        <td class="px-4 py-2 border">{{ $orderItem->quantity * $orderItem->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mt-4"><strong>Total Price:</strong> {{ $order->total_amount }}</p>
        <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <!-- Form untuk mengubah status pesanan -->
    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <label for="status">Update Status:</label>
        <select name="status" id="status" class="mt-2 border-gray-300 rounded">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
        </select>
        <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Update Status</button>
    </form>
@endsection
