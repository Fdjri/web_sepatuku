<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sepaTUKU</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-800 font-sans scroll-smooth">

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

    <!-- Section Home -->
    <section id="home" class="bg-cover bg-center h-screen" style="background-image: url('/images/home.jpg');">
        <div class="h-full flex items-center justify-center bg-black bg-opacity-50 text-center">
            <div class="text-white">
                <h2 class="text-5xl font-bold mb-6">Discover Your Style</h2>
                <p class="text-lg mb-8">Elegance is not standing out, but being remembered.</p>
                <a href="#produk" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Shop Now</a>
            </div>
        </div>
    </section>

    <!-- Section Produk -->
    <section id="produk" class="container mx-auto py-16">
        <h3 class="text-3xl font-semibold text-center mb-8 text-gray-800">Produk Kami</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transform transition">
                <img src="/images/adidas.jpg" alt="Sepatu Sport" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Sepatu Sport</h4>
                    <p class="text-gray-600 mb-4">Mulai dari Rp 750.000</p>
                    <a href="#" class="block text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah ke Keranjang</a>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transform transition">
                <img src="/images/converse.jpg" alt="Sepatu Casual" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Sepatu Casual</h4>
                    <p class="text-gray-600 mb-4">Mulai dari Rp 600.000</p>
                    <a href="#" class="block text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah ke Keranjang</a>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:scale-105 transform transition">
                <img src="/images/hushpuppies.jpg" alt="Sepatu Formal" class="w-full h-60 object-cover">
                <div class="p-6">
                    <h4 class="text-xl font-semibold text-gray-800 mb-2">Sepatu Formal</h4>
                    <p class="text-gray-600 mb-4">Mulai dari Rp 800.000</p>
                    <a href="#" class="block text-center bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah ke Keranjang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Tentang Kami -->
    <section id="tentang-kami" class="bg-gray-100 py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-semibold text-gray-800 mb-6">Tentang Kami</h3>
            <p class="text-lg text-gray-600">
                SepaTUKU adalah toko sepatu yang mengedepankan kualitas dan gaya. Kami percaya bahwa sepatu bukan hanya alas kaki, tapi juga representasi kepribadian Anda.
            </p>
        </div>
    </section>

    <!-- Section Kontak -->
    <section id="kontak" class="container mx-auto py-16">
        <h3 class="text-3xl font-semibold text-center mb-8 text-gray-800">Kontak Kami</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="text-center">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Alamat</h4>
                <p class="text-gray-600">Jl. Bersamamu No. 123, Malang</p>
            </div>
            <div class="text-center">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Email</h4>
                <p class="text-gray-600">support@sepatuku.com</p>
            </div>
            <div class="text-center">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Media Sosial</h4>
                <p class="text-gray-600">Instagram: @sepatuku</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 sepaTUKU. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
