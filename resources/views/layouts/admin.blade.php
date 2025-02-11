<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <!-- Tambahkan link ke Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tambahkan CSS khusus jika diperlukan -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex flex-col">
            <div class="p-4 text-center text-2xl font-bold border-b border-gray-700">
                Admin Panel
            </div>
            <nav class="flex-1 mt-4">
                <ul>
                    <li class="border-b border-gray-700">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="border-b border-gray-700">
                        <a href="{{ route('admin.products.index') }}" 
                           class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700' : '' }}">
                            Manage Products
                        </a>
                    </li>
                    <li class="border-b border-gray-700">
                        <a href="{{ route('admin.users.index') }}" 
                           class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                            Manage Users
                        </a>
                    </li>
                    <li class="border-b border-gray-700">
                        <a href="{{ route('admin.orders.index') }}" 
                           class="block py-2 px-4 hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700' : '' }}">
                            Manage Orders
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-gray-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full py-2 px-4 bg-red-600 hover:bg-red-700 text-white rounded">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1">
            <!-- Header -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-4 px-6 sm:px-8 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900"></h1>
                </div>
            </header>
            
            <!-- Main Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
