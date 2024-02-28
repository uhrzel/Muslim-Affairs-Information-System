<x-app-layout>
    <x-slot name="header">
        <div class="flex  text-white">
            <h2 class="font-semibold text-xl leading-tight w-full">
                {{ __('User List') }}
            </h2>
            <div class="relative pr-4"> <!-- Adjust the padding as needed -->
                <input type="text" id="searchInput" class="w-full border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring focus:border-indigo-300" placeholder="Search...">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
            </div>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-800">
                        <thead class="text-xs uppercase bg-indigo-700 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Created At</th>
                                <th scope="col" class="px-6 py-3">Updated At</th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @foreach($users as $user)
                            <tr class="bg-white border-b dark:bg-white dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-200">
                                <td scope="row" class="user-id px-6 py-4 font-medium whitespace-nowrap">{{ $user->id }}</td>
                                <td class="user-name px-6 py-4">{{ $user->name }}</td>
                                <td class="user-email px-6 py-4">{{ $user->email }}</td>
                                <td class="user-type px-6 py-4">{{ $user->type }}</td>
                                <td class="px-6 py-4">{{ $user->created_at }}</td>
                                <td class="px-6 py-4">{{ $user->updated_at }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.userShow', $user->id) }}" class="w-24 inline-flex items-center bg-indigo-500 text-white rounded-full px-4 py-2 leading-none hover:bg-indigo-600">
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
    <script>
        // Real-time search functionality
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#searchResults tr');

            tableRows.forEach(row => {
                const userId = row.querySelector('.user-id').textContent.toLowerCase();
                const userName = row.querySelector('.user-name').textContent.toLowerCase();
                const userEmail = row.querySelector('.user-email').textContent.toLowerCase();
                const userType = row.querySelector('.user-type').textContent.toLowerCase();

                if (userId.includes(searchTerm) || userName.includes(searchTerm) || userEmail.includes(searchTerm) || userType.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>