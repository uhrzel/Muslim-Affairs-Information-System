<x-app-layout>
    <x-slot name="header">
        <div class="flex bg-blue-700">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight w-full">
                {{ __('Reports from Users') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs uppercase bg-green-600 text-black">
                            <tr>
                                <th scope="col" class="px-6 py-3">Report From</th>
                                <th scope="col" class="px-6 py-3">User Email</th>
                                <th scope="col" class="px-6 py-3">Report Title </th>
                                <th scope="col" class="px-6 py-3">Report Description</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                                <th scope="col" class="px-6 py-3">Created At</th>

                                <!-- Show Status and Action columns only for admin users -->
                                @if(auth()->user()->type === 'admin')
                                <th scope="col" class="px-6 py-3">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $user->user->name }}</td>
                                <td class="px-6 py-4">{{ $user->user->email }}</td>
                                <td class="px-6 py-4">{{ $user->report_title}}</td>
                                <td class="px-6 py-4">{{ $user->report_description }}</td>
                                <td class="px-6 py-4">{{ $user->status }}</td>
                                <td class="px-6 py-4">{{ $user->created_at}}</td>

                                <!-- Show Status and Action columns only for admin users -->
                                @if(auth()->user()->type === 'admin')
                                <td class="px-6 py-4 flex items-center">
                                    @if($user->status === 'pending')
                                    <div class="flex space-x-2">
                                        <form action="{{ route('admin.reportUpdate', $user->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="settled">
                                            <button type="submit" class="inline-block bg-blue-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">
                                                Settled
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.reportUpdate', $user->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="cancelled">
                                            <button type="submit" class="inline-block bg-red-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-red-200">
                                                Cancel
                                            </button>
                                        </form>
                                    </div>
                                    @else
                                    <span class="text-gray-500">Completed</span>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>