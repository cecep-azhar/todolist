<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FathTDL</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">
    <!-- 00. Navbar -->
    <nav class="bg-blue-600">
        <div class="container mx-auto px-4 py-2 flex items-center justify-between">
            <div class="flex items-center">
                <img src="{{ asset('/logo-light.png') }}" alt="Fathforce Logo" class="h-10 mr-3">
                {{-- <div class="text-white text-xl font-bold">FathTDL</div> --}}
            </div>
            <!-- Future navbar items can go here -->
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <!-- 01. Content -->
        <h1 class="text-center text-2xl font-bold text-blue-700 mb-6">FathTDL</h1>
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded-lg mb-6 p-4">
                    <div class="mb-4">
                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 p-3 rounded">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="bg-red-100 text-red-800 p-3 rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <!-- 02. Form input data -->
                    <form id="todo-form" action="{{ route('todo.post') }}" method="post">
                        @csrf
                        <div class="flex mb-4">
                            <input type="text" name="task" id="todo-input" placeholder="Tambah task baru" required
                                value="{{ old('task') }}" class="flex-1 p-2 border rounded-l-lg">
                            <button class="bg-blue-600 text-white p-2 rounded-r-lg hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <!-- 03. Searching -->
                    <form id="todo-form" action="{{ route('todo') }}" method="get" class="mb-4">
                        <div class="flex">
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="masukkan kata kunci" class="flex-1 p-2 border rounded-l-lg">
                            <button class="bg-blue-600 text-white p-2 rounded-r-lg hover:bg-blue-700">Cari</button>
                        </div>
                    </form>

                    <ul class="mb-6" id="todo-list">
                        @foreach ($data as $item)
                            <!-- 04. Display Data -->
                            <li class="flex justify-between items-center p-2 bg-gray-100 rounded-lg mb-2">
                                <span class="task-text">
                                    {!! $item->is_done == '1' ? '<del>' : '' !!}
                                    {{ $item->task }}
                                    {!! $item->is_done == '1' ? '</del>' : '' !!}
                                </span>
                                <div class="flex space-x-2">
                                    <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST"
                                        onsubmit="return confirm('Are you sure, you want to delete this data?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white p-2 rounded hover:bg-red-700">✕</button>
                                    </form>
                                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="task" value="{{ $item->task }}">
                                        <input type="hidden" name="is_done"
                                            value="{{ $item->is_done == '1' ? '0' : '1' }}">
                                        <button
                                            class="bg-blue-600 text-white p-2 rounded hover:bg-blue-700">{{ $item->is_done == '1' ? 'Belum' : 'Selesai' }}</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- 06. Pagination -->
                    <div class="flex justify-center">
                        {{ $data->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
