<x-app-layout>
    <x-slot name="header">
        <div class="flex bg-blue-700">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-full">
                {{ __('News List') }}
            </h2>
            <a href="{{ route('admin.newsCreate') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-black">
                        <thead class="text-xs text-black uppercase bg-green-600 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">News Title</th>
                                <th scope="col" class="px-6 py-3">News Content</th>
                                <th scope="col" class="px-6 py-3">News Image</th>
                                <th scope="col" class="px-6 py-3">News Date</th>
                                <th scope="col" class="px-6 py-3">News Time</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $News)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">{{ $News->news_title }}</td>
                                <td class="px-6 py-4">{{ $News->news_content}}</td>
                                <td class="px-6 py-4">{{ $News->news_image }}</td>
                                <td class="px-6 py-4">{{ $News->news_date }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($News->news_time)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.newsShow', $News->id) }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>