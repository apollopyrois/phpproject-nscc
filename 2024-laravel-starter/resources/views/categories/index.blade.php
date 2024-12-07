<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
</head>
<body>
    <h1>Category List</h1>
    
    {{ session('success') }}

    <ul>
        @forelse ($categories as $category)
            <li>{{ $category->name }}</li>
        @empty
            <li>No categories available.</li>
        @endforelse
    </ul>

    <a href="{{ route('categories.create') }}">Add another category?</a>
</body>
</html>
