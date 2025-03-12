<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-500 h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-6 w-2/3">
        <h2 class="text-2xl font-bold mb-4">Todo List</h2>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4 flex">
            @csrf
            <input type="text" name="description" placeholder="Add a new task" class="border p-2 flex-grow">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">+</button>
        </form>

        <ul>
            @foreach ($tasks as $task)
            <li class="flex items-center justify-between p-2 border-b">
                <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex items-center">
                    @csrf
                    @method('PATCH')
                    <input type="checkbox" name="is_completed" onchange="this.form.submit()"
                        {{ $task->is_completed ? 'checked' : '' }}>
                    <span
                        class="{{ $task->is_completed ? 'line-through text-gray-500' : '' }} ml-2">{{ $task->description }}</span>
                </form>

                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500">✏️</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">🗑</button>
                    </form>
                </div>
            </li>
            @endforeach
        </ul>
        <form action="{{ route('tasks.clearCompleted') }}" method="POST"
            onsubmit="return confirm('Are you sure you want to delete all completed tasks?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4">Clear Completed</button>
        </form>


        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </div>
</body>

</html>