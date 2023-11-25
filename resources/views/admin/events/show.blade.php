<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events Details') }}
    </h2>
    </x-slot> --}}
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-4 py-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 sm:px-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                        {{ $event->event_name }}
                    </h3>

                    <div class="flex gap-4">
                        <a href="{{ route('admin.events') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                            Back
                        </a>

                        <a href="{{ route('admin.eventsEdit', $event->id) }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                            Edit
                        </a>

                        <form action="{{ route('admin.eventsDestroy', $event->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-400 hover:text-red-600 underline dark:text-red-300 dark:hover:text-red-400" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">ID</th>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ $event->id }}
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Event Name</th>
                            <td class="px-6 py-4">
                                {{ $event->event_name }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Event Description</th>
                            <td class="px-6 py-4">
                                {{ $event->event_description }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Events Image</th>
                            <td class="px-6 py-4">
                                <img src="{{ asset('storage/events_images/' .basename($event->event_image))}}" class="w-32 h-32 object-cover">

                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Event Date</th>
                            <td class="px-6 py-4">
                                {{ $event->event_date }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Events Time</th>
                            <td class="px-6 py-4">
                                {{ $event->event_time }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Created At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($event->created_at)) }}
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="col" class="px-6 py-3">Updated At</th>
                            <td class="px-6 py-4">
                                {{ date('jS M Y', strtotime($event->updated_at)) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>