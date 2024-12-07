<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
</head>
<body>
    {{--error check --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Please enter a category:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
