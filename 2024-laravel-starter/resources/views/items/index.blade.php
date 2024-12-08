<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product hell</title>
</head>
<body>
    <h1>Item List</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('items.create') }}">Add new item?</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Picture</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->picture) }}" alt="Item Image" width="100">
                    </td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
