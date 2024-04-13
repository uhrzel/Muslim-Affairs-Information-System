<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/man.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-800 text-white py-4 px-6 text-lg font-semibold uppercase">404 Not Found</div>

                <div class="p-6">
                    <p class="text-gray-700">{{ __('Sorry, the page you are looking for could not be found.') }}</p>
                    <p class="text-gray-700">If you believe this is an error or need assistance, please contact us:</p>
                    <ul class="list-disc pl-6 mt-2 text-gray-700">
                        <li><i class="fas fa-envelope mr-2"></i>Email: <a href="mailto:muslimafairs123@gmail.com" class="text-blue-500 hover:underline">muslimaffairs123@gmail.com</a></li>
                        <li><i class="fas fa-phone mr-2"></i>Phone: <a href="tel:+639154138624" class="text-blue-500 hover:underline">+639154138624</a></li>
                    </ul>
                    <p class="mt-4"><a href="javascript:history.back()" class="text-blue-500 hover:underline"><i class="fas fa-arrow-left mr-2"></i>Go back to previous page</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>