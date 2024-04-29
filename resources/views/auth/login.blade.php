<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Muslim Affairs Information System</title>
    <link rel="icon" type="image/png" href="img/man.png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white rounded-lg shadow-md p-8 max-w-md w-full">

        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" :value="old('email')" required autofocus autocomplete="username" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>
            <div>
                <button type="submit" class="w-full mt-4 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log in</button>
            </div>
        </form>
        <div class="mt-4">
            <a href="{{ route('google-auth') }}" class="flex items-center justify-center w-full py-2 px-4 border border-indigo-600 rounded-md shadow-sm text-sm font-medium text-black hover:rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition-all duration-300 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white">
                <img src="src/img/google-logo.png" alt="Your Logo" class="mr-2 h-5 w-5 transition-all duration-300" /> Continue with Google
            </a>
        </div>

        @if (Route::has('password.request'))
        <div class="text-sm text-center mt-4">
            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                Forgot your password?
            </a>
        </div>
        @endif
    </div>
</body>

</html>