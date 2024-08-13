<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- 00. Navbar -->
    <nav class="bg-blue-600 p-4">
        <div class="text-center text-white text-xl font-bold">
            Simple To Do List
        </div>
    </nav>

    <div class="container mx-auto mt-6 px-4">
        <!-- 01. Content -->
        <h1 class="text-center text-2xl font-semibold text-gray-800 mb-6">To Do List</h1>

        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <!-- 02. Form input data -->
            <form id="todo-form" action="" method="post" class="flex space-x-2">
                <input type="text"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    name="task" id="todo-input" placeholder="Tambah task baru" required>
                <button class="bg-blue-600 text-white rounded-md px-4 py-2">Simpan</button>
            </form>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4">
            <!-- 03. Searching -->
            <form id="todo-form" action="" method="get" class="flex space-x-2 mb-4">
                <input type="text"
                    class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    name="search" value="" placeholder="Masukkan kata kunci">
                <button class="bg-gray-600 text-white rounded-md px-4 py-2">Cari</button>
            </form>

            <!-- 04. Display Data -->
            <ul class="divide-y divide-gray-200" id="todo-list">
                <li class="py-4 flex justify-between items-center">
                    <span class="text-gray-800">Coding</span>
                    <div class="flex space-x-2">
                        <button class="bg-red-500 text-white rounded-md px-3 py-1 delete-btn">✕</button>
                        <button class="bg-blue-600 text-white rounded-md px-3 py-1 edit-btn" data-toggle="collapse"
                            data-target="#collapse-1" aria-expanded="false">✎</button>
                    </div>
                </li>

                <!-- 05. Update Data -->
                <li class="collapse" id="collapse-1">
                    <form action="" method="POST" class="mt-4">
                        <div class="flex space-x-2 mb-3">
                            <input type="text"
                                class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                                name="task" value="Coding">
                            <button class="bg-blue-500 text-white rounded-md px-4 py-2" type="button">Update</button>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex items-center">
                                <input type="radio" id="done" name="is_done" value="1" class="mr-2">
                                <label for="done">Selesai</label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" id="not_done" name="is_done" value="0" class="mr-2">
                                <label for="not_done">Belum</label>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</body>

</html>
