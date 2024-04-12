<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" type="image/png" href="img/man.png" /> -->
    <link rel="icon" type="image/png" href="{{ asset('img/man.png') }}" />

    <title>Muslim Affairs Information System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/v4-shims.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rzQ3sBBRRF1u8+P8p4iUyVMp5O3Jbiu2n6cLhxdHP5qNaxC4Zq7uJ68Hlh1e5thW" crossorigin="anonymous">
    <!-- Add this line to include flatpickr library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-QrHR7IP3w04pBP35g2Kwms8thZfGKiuULYTwhj1TZ9e6KZWVmJM1rRnDE7IMh5Zfz9ac8Hpnpllnlt2pbS4d7w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Bevan:ital@0;1&family=Calistoga&family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bevan:ital@0;1&family=Calistoga&family=Candal&family=Holtwood+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-dAsm+MTGpWPjfZlKlGrcFLr0X2FlAoZz3Wr1F+L3yU2yq8+56D4tVl3RtfrDxWp+9T8UVvqgqlVXpDBsKDPyJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Add this line to include the date picker script -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased ">
    <div class="min-h-screen bg-gray-300">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-blue-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        <footer class="flex-shrink-0 px-6 py-4 ">
            <p class="flex items-center justify-center gap-1 text-sm text-gray-600 dark:text-gray-400">
            <div class="container mx-auto text-center text-sm">
                &copy;{{ date('Y') }} <a href="https://github.com/uhrzel/Muslim-Affairs-Information-System" class="hover:text-blue-600 hover:underline"> Muslim Affairs Information System. All rights reserved. </div>
            </p>
        </footer>

    </div>
</body>

</html>