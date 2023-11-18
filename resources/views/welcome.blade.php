<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Muslim Affairs Office Information System</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    <style>
        .bg-green-fullscreen {
            background-color: #052e16;
            width: 100%;
        }

        .drop-shadow-lg {
            filter: drop-shadow(0 0 0.75rem rgba(0, 0, 0, 0.1));
        }
    </style>
</head>

<body class="bg-green-fullscreen">

    <nav class="flex items-center justify-between flex-wrap bg-transparent p-6">
        <div class="flex gap-4 items-center flex-shrink-0 text-white mr-6">
            <a href="#" class="flex items-center">
                <img src="img/logo1.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
            <a href="#" class="flex items-center">
                <img src="img/logo2.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
            <a href="#" class="flex items-center">
                <img src="img/logo3.png" alt="Muslim Affairs Office Logo" class="w-16 h-16 rounded-full">
            </a>
        </div>
        <div class="flex items-center">
            @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="bg-yellow-400 text-dark font-bold py-2 px-10 rounded-full">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="bg-yellow-400 text-dark font-bold py-2 px-10 rounded-full mr-4">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="bg-yellow-400 text-dark font-bold py-2 px-10 rounded-full">Register</a>
            @endif
            @endauth
            @endif
        </div>
    </nav>
    <main class="flex flex-col justify-center items-center">
        <div class="w-full grid grid-cols-12 px-12 pt-8">
            <div class="col-span-6 flex flex-col justify-center">
                <h1 class="text-7xl font-bold text-white"><span class="text-yellow-300">Muslim</span> Affairs<span class="text-white"> <br> Office<span class="text-yellow-300"> Information System</span></h1>
            </div>
            <div class="col-span-6">
                <img src="img/man.png" alt="Picture of a man" class="w-96 object-cover mx-auto drop-shadow-lg">
            </div>
        </div>

        <div class="w-full grid grid-cols-12 px-12 mt-40 gap-4">
            <div class="col-span-3">
                <div class="flex justify-center items-center">
                    <img src="img/info.png" alt="about" class="w-20 h-20 rounded-full mr-10">
                    <h1 class="text-2xl font-bold text-white">About</h1>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center">
                    <img src="img/calendar.png" alt="about" class="w-20 h-20 rounded-full mr-10">
                    <h1 class="text-2xl font-bold text-white">Latest Events</h1>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center">
                    <img src="img/news2.png" alt="about" class="w-20 h-20 rounded-full mr-10">
                    <h1 class="text-2xl font-bold text-white">Latest News</h1>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center">
                    <img src="img/ads2.png" alt="about" class="w-20 h-20 rounded-full mr-10">
                </div>
            </div>

            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/geo.png" alt="about" class="w-10 h-15  mr-10">
                    <h3 class="text-sm text-white">
                        Tupi South Cotabato <br>
                        9505 Philippines
                    </h3>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/news1.png" alt="about" class="w-12 h-20 mr-10">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>
            <div class="col-span-3 row-span-2">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/ads1.png" alt="about" class="w-30 h-40 rounded-full mr-10">
                </div>
            </div>

            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/tel.png" alt="about" class="w-12 h-12 rounded-full mr-10">
                    <h3 class="text-sm text-white">
                        +63 999 999 9999
                    </h3>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/news1.png" alt="about" class="w-12 h-20 mr-10">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>

            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/mail.png" alt="about" class="w-12 h-12 rounded-full mr-10">
                    <h3 class="text-sm text-white">
                        info@system.com
                    </h3>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>
            <div class="col-span-3">
                <div class="flex justify-center items-center mt-8">
                    <img src="img/news1.png" alt="about" class="w-12 h-20 mr-10">
                    <h4 class="text-sm text-white">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, cumque in esse ullam odio rerum vero voluptatum minima deleniti, consectetur illum reprehenderit a sed, id fugiat. Ipsam animi earum eligendi!
                    </h4>
                </div>
            </div>

            <div class="col-span-12">
                <div class="flex justify-start items-center py-12">
                    <h1 class="text-2xl font-bold text-white">
                        MaoInfoSys All Rights Reserved
                    </h1>

                </div>
            </div>
        </div>
    </main>
</body>

</html>