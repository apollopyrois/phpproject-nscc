<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Items List</h2>
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
                {{--i had it working for bit then it stopped working and idk how to fix it--}}
                <td><img src="{{ asset('storage/' . $item->picture) }}" alt="Item Image" width="100"></td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
