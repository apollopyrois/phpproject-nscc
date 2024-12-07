<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    {{--error check--}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{--category submit--}}
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div>
            <label for="name">Edit Category:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
