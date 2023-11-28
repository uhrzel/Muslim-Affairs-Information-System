<x-app-layout>
    <x-slot name="header">
        <div class="flex bg-blue-700">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-full">
                {{ __('Event List') }}
            </h2>
            <a href="{{ route('admin.eventsCreate') }}" class="inline-flex items-center bg-blue-500 text-white rounded-full px-4 py-2 leading-none text-sm dark:hover:text-green-200">
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
                                <th scope="col" class="px-6 py-3">Event Name</th>
                                <th scope="col" class="px-6 py-3">Event Description</th>
                                <th scope="col" class="px-6 py-3">Event Image</th>
                                <th scope="col" class="px-6 py-3">Event Date</th>
                                <th scope="col" class="px-6 py-3">Event Time</th>
                                <th scope="col" class="px-6 py-3">

                                    Action

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $Events)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">{{ $Events->event_name }}</td>
                                <td class="px-6 py-4">{{ $Events->event_description}}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/events_images/' . basename($Events->event_image)) }}" class="max-w-full h-20 w-20">
                                </td>
                                <td class="px-6 py-4">{{ $Events->event_date }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($Events->event_time)->format('h:i A') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.eventsShow', $Events->id) }}" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">
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