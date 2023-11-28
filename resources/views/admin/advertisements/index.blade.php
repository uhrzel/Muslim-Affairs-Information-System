<x-app-layout>
    <x-slot name="header">
        <div class="flex bg-blue-700">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-full">
                {{ __('Advertisement List') }}
            </h2>
            <a href="{{ route('admin.advertisementCreate') }}" class="inline-flex items-center bg-blue-500 text-white rounded-full px-4 py-2 leading-none text-sm dark:hover:text-green-200">
                <i class="fas fa-plus mr-1"></i>
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
                                <th scope="col" class="px-6 py-3">Advertisement Title</th>
                                <th scope="col" class="px-6 py-3">Advertisement Description</th>
                                <th scope="col" class="px-6 py-3">Advertisement Image</th>
                                <th scope="col" class="px-6 py-3">Advertisement Video</th>

                                <th scope="col" class="px-6 py-3">

                                    Action

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($advertisements as $Ads)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">{{ $Ads->ads_title }}</td>
                                <td class="px-6 py-4">{{ $Ads->ads_description}}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/ads_images/' . basename($Ads->ads_images)) }}" class="max-w-full h-20 w-20">
                                </td>

                                <td class="px-6 py-4">
                                    <video width="200" height="200" controls>
                                        <source src="{{ asset('storage/ads_videos/' . basename($Ads->ads_video)) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.advertisementShow', $Ads->id) }}" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-green-200">
                                        <i class="fas fa-eye mr-1"></i>
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