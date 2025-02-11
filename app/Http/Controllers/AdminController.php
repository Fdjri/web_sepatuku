<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Category;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index()
    {
        $userCount = User::count();
        $productCount = Shoe::count();

        return view('admin.dashboard', compact('userCount', 'productCount'));
    }

    // ================== Fungsi Orders ==================

    // Menampilkan semua pesanan
    public function indexOrders()
    {
        // Mengambil semua pesanan dengan relasi ke user dan orderItems.shoe
        $orders = Order::with('user', 'orderItems.shoe')->get();
        return view('admin.orders.index', compact('orders'));
    }

    // Menampilkan detail pesanan
    public function showOrder($id)
    {
        // Menampilkan pesanan dengan relasi ke user dan orderItems.shoe
        $order = Order::with('user', 'orderItems.shoe')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // Mengubah status pesanan
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,canceled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status pesanan berhasil diperbarui!');
    }

    // Menghapus pesanan
    public function destroyOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Pesanan berhasil dihapus!');
    }

    // ================== Fungsi Products ==================

    // Menampilkan semua sepatu
    public function indexProducts()
    {
        $shoes = Shoe::all();
        return view('admin.products.index', compact('shoes'));
    }

    // Menampilkan detail sepatu
    public function showProduct($id)
    {
        $shoe = Shoe::with('category')->findOrFail($id);
        return view('admin.products.show', compact('shoe'));
    }

    // Menampilkan form untuk menambahkan sepatu
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Menyimpan sepatu baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Shoe();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Sepatu berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit sepatu
    public function edit($id)
    {
        $product = Shoe::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Memperbarui data sepatu
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Shoe::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists('public/' . $product->image)) {
                Storage::delete('public/' . $product->image);
            }
            $product->image = $request->file('image')->store('products', 'public');
        }

        $product->save();
        return redirect()->route('admin.products.index')->with('success', 'Sepatu berhasil diperbarui!');
    }

    // Menghapus sepatu
    public function destroy($id)
    {
        $product = Shoe::findOrFail($id);

        if ($product->image && Storage::exists('public/' . $product->image)) {
            Storage::delete('public/' . $product->image);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Sepatu berhasil dihapus!');
    }

    // ================== Fungsi Users ==================

    // Menampilkan semua pengguna
    public function indexUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form untuk membuat pengguna baru
    public function createUser()
    {
        return view('admin.users.create');
    }

    // Menyimpan pengguna baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Memperbarui data pengguna
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui!');
    }

    // Menghapus pengguna
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
