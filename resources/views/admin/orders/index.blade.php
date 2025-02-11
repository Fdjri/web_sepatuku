@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-semibold text-gray-900">Manage Orders</h1>
    <table class="min-w-full mt-4">
        <thead>
            <tr>
                <th class="px-4 py-2">Order ID</th>
                <th class="px-4 py-2">User</th>
                <th class="px-4 py-2">Shoe</th>
                <th class="px-4 py-2">Quantity</th>
                <th class="px-4 py-2">Total Price</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td class="px-4 py-2">{{ $order->id }}</td>
                        <td class="px-4 py-2">{{ $order->user->name }}</td>
                        <td class="px-4 py-2">{{ $orderItem->shoe->name }}</td>
                        <td class="px-4 py-2">{{ $orderItem->quantity }}</td>
                        <td class="px-4 py-2">{{ $orderItem->quantity * $orderItem->price }}</td>
                        <td class="px-4 py-2">{{ ucfirst($order->status) }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-blue-500">View</a>
                            |
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
