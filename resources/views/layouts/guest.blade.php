<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Muslim Affairs Information System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .min-h-screen {
        background-color: #052e16;
    }
</style>

<body class="font-sans text-black antialiased ">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 ">
        <div>
            <a href="/">
                <img src="{{ asset('img/logo1.png') }}" class="logo block h-20 w-auto" alt="Logo">

            </a>
        </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-xl rounded-lg bg-green-800 dark:bg-green-900 transition duration-500 ease-in-out transform hover:scale-105">
            {{ $slot }}
        </div>


    </div>
</body>

</html>