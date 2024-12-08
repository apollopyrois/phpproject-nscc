<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>category hell</title>
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

    {{--category resubmit--}}
    <h2>Category List</h2>
    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}
                <form action="/categories/{{ $category->id }}/edit" method="GET" style="display: inline;">
                    <button type="submit">Edit</button>
                </form>
            </li>
        @endforeach
    </ul>

    <div>
        <a href="/categories/create" style="display: inline-block; margin-bottom: 20px;">Create new category?</a>
    </div>
</body>
</html>
