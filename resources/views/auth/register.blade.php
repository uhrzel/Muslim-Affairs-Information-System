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
    <div class="bg-white rounded-lg shadow-md p-4 max-w-sm w-full">
        <h1 class="text-lg font-bold mb-2 text-center">Register</h1>
        <form method="POST" action="{{ route('register') }}" class="space-y-2">
            @csrf
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input id="name" name="name" type="text" :value="old('name')" required autofocus autocomplete="name" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('name')" class="mt-1" />
            </div>
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" :value="old('email')" required autocomplete="email" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('email')" class="mt-1" />
            </div>
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required autocomplete="new-password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('password')" class="mt-1" />
            </div>
            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-2">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
            </div>
            <!-- Register Button -->
            <div class="flex items-center justify-center">
                <button type="submit" class="mt-4 flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 w-full">Create your account</button>
            </div>
        </form>
        <div class="mt-4">
            <p class="text-center mb-2">Have an account? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-900">Log in now</a></p>
            <p class="text-center mb-2">Or with</p>
            <a href="{{ route('google-auth') }}" class="flex items-center justify-center w-full py-2 px-4 border border-indigo-600 rounded-md shadow-sm text-sm font-medium text-black hover:rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 transition-all duration-300 hover:border-indigo-600 hover:bg-indigo-600 hover:text-white">
                <img src="src/img/google-logo.png" alt="Google Logo" class="mr-2 h-5 w-5 transition-all duration-300" /> Google
            </a>
        </div>
    </div>

</body>

</html>