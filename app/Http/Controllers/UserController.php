<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan dashboard pengguna
    public function dashboard()
    {
        // Ambil data produk dari database
        $products = Shoe::all();

        // Kirim data ke view
        return view('user.dashboard', compact('products'));
    }

    // Menampilkan daftar produk sepatu
    public function indexProducts()
    {
        // Mengambil semua produk sepatu beserta relasi kategorinya
        $products = Shoe::with('category')->get();

        return view('user.products', compact('products')); // View: resources/views/user/products.blade.php
    }

    // Menambahkan produk ke dalam pesanan
    public function addToOrder(Request $request, $id)
    {
        // Validasi input jumlah (quantity)
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Mencari produk berdasarkan ID
        $product = Shoe::findOrFail($id);

        // Mengecek apakah stok mencukupi
        $quantity = $request->input('quantity');
        if ($product->stock < $quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk pesanan ini.');
        }

        // Membuat pesanan baru jika belum ada pesanan yang pending
        $order = Order::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->first();

        if (!$order) {
            // Jika pesanan belum ada, buat pesanan baru
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'total_amount' => 0,  // Inisialisasi total_amount
            ]);
        }

        // Tambahkan item ke dalam pesanan
        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'shoe_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price,
        ]);

        // Mengurangi stok produk
        $product->decrement('stock', $quantity);

        // Hitung ulang total harga pesanan dan perbarui
        $order->calculateTotalAmount();

        return redirect()->route('user.orders')->with('success', 'Produk berhasil ditambahkan ke pesanan.');
    }

    // Melihat daftar pesanan pengguna
    public function viewOrders()
    {
        // Mengambil semua pesanan pengguna beserta detail sepatu dan item pesanan
        $orders = Order::where('user_id', Auth::id())
            ->with('orderItems.shoe') // Menambahkan relasi dengan orderItems dan shoe
            ->get();

        return view('user.orders', compact('orders')); // View: resources/views/user/orders.blade.php
    }
}
