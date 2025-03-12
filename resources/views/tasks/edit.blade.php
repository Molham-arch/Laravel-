<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-blue-500 to-purple-500 h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-6 w-2/3">
        <h2 class="text-2xl font-bold mb-4">Edit Task</h2>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="mb-4">
            @csrf
            @method('PATCH')
            <input type="text" name="description" value="{{ $task->description }}" class="border p-2 w-full">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Update</button>
        </form>

        <a href="{{ route('tasks.index') }}" class="text-blue-500">Back</a>
    </div>
</body>

</html>