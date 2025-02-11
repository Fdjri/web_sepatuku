<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard User')</title>
    <!-- Link CSS Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-blue-600 py-4">
        <div class="max-w-screen-xl mx-auto flex justify-between items-center px-6">
            <a href="{{ route('user.dashboard') }}" class="text-white text-2xl font-bold">SepaTUKU</a>
            <div class="flex gap-6">
                <a href="{{ route('user.dashboard') }}" class="text-white text-lg hover:text-blue-300 transition-colors">Dashboard</a>
                <a href="{{ route('user.products') }}" class="text-white text-lg hover:text-blue-300 transition-colors">Produk</a>
                <a href="{{ route('user.orders') }}" class="text-white text-lg hover:text-blue-300 transition-colors">Pesanan Saya</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-white text-lg hover:text-blue-300 transition-colors focus:outline-none">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="max-w-screen-xl mx-auto py-8 flex-grow">
        <div class="bg-white shadow-lg rounded-lg p-8">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="max-w-screen-xl mx-auto text-center">
            <p>&copy; {{ date('Y') }} SepaTUKU. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
