<x-app-layout>
    <x-slot name="header">
        <div class="flex bg-blue-700">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-full">
                {{ __('Reports from Users') }} (10)
            </h2>

            <a href="{{ route('admin.reportCreate') }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-green-600 text-black">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Title</th>
                                <th scope="col" class="px-6 py-3">Description</th>
                                <th scope="col" class="px-6 py-3">User</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Created At</th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            {{-- @foreach($reports as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap ">{{ $user->id }}</td>
                            <td class="px-6 py-4">{{ $user->id }}</td>
                            <td class="px-6 py-4">{{ $user->title }}</td>
                            <td class="px-6 py-4">{{ $user->description }}</td>
                            <td class="px-6 py-4">{{ $user->user }}</td>
                            <td class="px-6 py-4">{{ $user->status }}</td>
                            <td class="px-6 py-4">{{ $user->created }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.userShow', $user->id) }}" class="text-blue-400 hover:text-blue-600 underline dark:text-blue-300 dark:hover:text-blue-400">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>