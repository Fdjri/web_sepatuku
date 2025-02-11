<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - sepaTUKU</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-sans scroll-smooth min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">sepa<span class="text-blue-600">TUKU</span></h1>
            <nav>
                <ul class="flex space-x-6 text-gray-600">
                    <li><a href="#home" class="hover:text-blue-600">Home</a></li>
                    <li><a href="#produk" class="hover:text-blue-600">Produk</a></li>
                    <li><a href="#tentang-kami" class="hover:text-blue-600">Tentang Kami</a></li>
                    <li><a href="#kontak" class="hover:text-blue-600">Kontak</a></li>
                </ul>
            </nav>
            <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Login
            </a>
        </div>
    </header>

    <!-- Login Selection -->
    <section class="container mx-auto py-16 px-6 flex-1 flex flex-col justify-center items-center bg-gradient-to-b from-blue-100 via-blue-200 to-blue-300 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">
            <span class="block text-blue-600">Selamat datang di sepaTUKU</span>
            <span class="block text-blue-800">Pilih untuk Login</span>
        </h2>
        <div class="space-y-6">
            <a href="{{ route('login.customer.form') }}" class="block bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                <i class="fas fa-user-alt mr-2"></i> Login sebagai Customer
            </a>
            <a href="{{ route('login.admin.form') }}" class="block bg-blue-600 text-white text-lg font-semibold px-8 py-4 rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                <i class="fas fa-cogs mr-2"></i> Login sebagai Admin
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 sepaTUKU. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
