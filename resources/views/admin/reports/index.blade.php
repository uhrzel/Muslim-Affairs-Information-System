    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center bg-blue-700 px-4 py-6">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Reports from Users') }}
                </h2>
                <div class="relative"> <!-- Adjust the padding as needed -->
                    <input type="text" id="searchInput" class="w-full border rounded-full px-4 py-2 pl-10 focus:outline-none focus:ring focus:border-blue-300" placeholder="Search...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>
            </div>

        </x-slot>


        <div class="mt-1 mr-4 flex items-center justify-end space-x-2">
            <a href="{{ route('export.excel') }}" id="exportExcel" class="inline-block bg-blue-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">Export Excel</a>
            <a href="{{ route('export.pdf') }}" id="exportPdf" class="inline-block bg-green-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">Export PDF</a>
            <a href="{{ route('export.word') }}" id="exportWord" class="inline-block bg-yellow-500 text-white rounded-full px-4 py-2 leading-none dark:hover:text-blue-200">Export Word</a>
        </div>

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
                            <tbody id="searchResults">
                                @foreach($reports as $user)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-6 py-4 user-name">{{ $user->user->name }}</td>
                                    <td class="px-6 py-4 user-email">{{ $user->user->email }}</td>
                                    <td class="px-6 py-4 user-reportTitle">{{ $user->report_title}}</td>
                                    <td class="px-6 py-4 user-reportDescription">{{ $user->report_description }}</td>
                                    <td class="px-6 py-4 user-status">{{ $user->status }}</td>
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
            <div id="confirmationModalPdf" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
                        <!-- Modal content -->
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                    <img src="img/pdf.png" alt="Icon" class="h-6 w-12">
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Export Confirmation
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Do you want to export this report as PDF?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button id="exportButton1" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Export
                            </button>
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal1()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="confirmationModalWord" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
                        <!-- Modal content -->
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                    <img src="img/word.png" alt="Icon" class="h-6 w-12">
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Export Confirmation
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Do you want to export this report as Word?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button id="exportButton2" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Export
                            </button>
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal2()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="confirmationModalExcel" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="document">
                        <!-- Modal content -->
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                    <img src="img/excel.png" alt="Icon" class="h-6 w-12">
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Export Confirmation
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Do you want to export this report as Excel?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button id="exportButton3" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Export
                            </button>
                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal3()">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Real-time search functionality
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('#searchResults tr');

                tableRows.forEach(row => {
                    const userName = row.querySelector('.user-name').textContent.toLowerCase();
                    const userEmail = row.querySelector('.user-email').textContent.toLowerCase();
                    const userReportTitle = row.querySelector('.user-reportTitle').textContent.toLowerCase();
                    const userDescription = row.querySelector('.user-reportDescription').textContent.toLowerCase();
                    const userStatus = row.querySelector('.user-status').textContent.toLowerCase();

                    if (userName.includes(searchTerm) || userEmail.includes(searchTerm) || userReportTitle.includes(searchTerm) || userDescription.includes(searchTerm) || userStatus.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            //pdf

            function showModal1() {
                document.getElementById('confirmationModalPdf').classList.remove('hidden');
                document.getElementsByTagName('html')[0].classList.add('overflow-y-hidden');
            }

            // Function to close the modal
            function closeModal1() {
                document.getElementById('confirmationModalPdf').classList.add('hidden');
                document.getElementsByTagName('html')[0].classList.remove('overflow-y-hidden');
            }

            // Handle click event on the "Export PDF" button to show the modal
            document.getElementById('exportPdf').addEventListener('click', function(e) {
                e.preventDefault();
                showModal1();
            });

            // Handle click event on the "Export" button in the modal to proceed with export
            document.getElementById('exportButton1').addEventListener('click', function() {
                window.location.href = "{{ route('export.pdf') }}";
                closeModal1();
            });

            //word

            function showModal2() {
                document.getElementById('confirmationModalWord').classList.remove('hidden');
                document.getElementsByTagName('html')[0].classList.add('overflow-y-hidden');
            }

            // Function to close the modal
            function closeModal2() {
                document.getElementById('confirmationModalWord').classList.add('hidden');
                document.getElementsByTagName('html')[0].classList.remove('overflow-y-hidden');
            }

            // Handle click event on the "Export PDF" button to show the modal
            document.getElementById('exportWord').addEventListener('click', function(e) {
                e.preventDefault();
                showModal2();
            });

            // Handle click event on the "Export" button in the modal to proceed with export
            document.getElementById('exportButton2').addEventListener('click', function() {
                window.location.href = "{{ route('export.word') }}";
                closeModal2();
            });

            //excel

            function showModal3() {
                document.getElementById('confirmationModalExcel').classList.remove('hidden');
                document.getElementsByTagName('html')[0].classList.add('overflow-y-hidden');
            }

            // Function to close the modal
            function closeModal3() {
                document.getElementById('confirmationModalExcel').classList.add('hidden');
                document.getElementsByTagName('html')[0].classList.remove('overflow-y-hidden');
            }

            // Handle click event on the "Export PDF" button to show the modal
            document.getElementById('exportExcel').addEventListener('click', function(e) {
                e.preventDefault();
                showModal3();
            });

            // Handle click event on the "Export" button in the modal to proceed with export
            document.getElementById('exportButton3').addEventListener('click', function() {
                window.location.href = "{{ route('export.excel') }}";
                closeModal3();
            });
        </script>
    </x-app-layout>