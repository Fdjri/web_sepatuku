<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Customer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <!-- Container Login -->
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Login - Customer</h1>
            <p class="text-sm text-gray-500">Masuk untuk melanjutkan ke toko sepaTUKU</p>
        </div>

        <!-- Form -->
        <form action="{{ route('login.customer.form') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required
                    class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @error('email')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                    class="mt-2 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                @error('password')
                    <div class="text-sm text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Error message for failed login -->
            @if(session('error'))
                <div class="text-sm text-red-500 mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300">
                Login
            </button>
        </form>
    </div>

</body>
</html>
