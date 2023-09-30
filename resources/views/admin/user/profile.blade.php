<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 d-flex justify-space-between align-items-center">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        User Profile
                    </h1>
                    <div class="flex items-center">
                        <a href="{{ route('admin.userEdit', $user->id) }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                            Edit
                        </a>
                        <form action="{{ route('admin.userDelete', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-600 underline dark:text-red-300 dark:hover:text-red-400 ml-6">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $user->name }}
                    </h2>
                    <ul class="list-disc">
                        <li class="text-gray-900 dark:text-gray-100">
                            <span class="font-bold">Email:</span> {{ $user->email }}
                        </li>
                        <li class="text-gray-900 dark:text-gray-100">
                            <span class="font-bold">Role:</span> {{ $user->type }}
                        </li>
                        <li class="text-gray-900 dark:text-gray-100">
                            <span class="font-bold">Created At:</span> {{ $user->created_at }}
                        </li>
                        <li class="text-gray-900 dark:text-gray-100">
                            <span class="font-bold">Updated At:</span> {{ $user->updated_at }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
