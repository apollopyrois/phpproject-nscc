<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product hell</title>
    {{--not to familiar with javascript so i copied this--}}
    <script>
        function confirmDelete(event, itemId) {
            event.preventDefault();
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById(`delete-form-${itemId}`).submit();
            }
        }
    </script>
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
                <th>Actions</th>
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
                        <img src="{{ asset('storage/app/public/' . $item->picture) }}" alt="Item Image" width="100">
                    </td>
                    <td>
                        <form action="{{ route('items.edit', $item->id) }}" method="GET" style="display: inline;">
                            <button type="submit">Edit</button>
                        </form>
                        <form id="delete-form-{{ $item->id }}" action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(event, {{ $item->id }})">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
