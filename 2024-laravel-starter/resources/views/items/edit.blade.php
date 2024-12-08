<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div>
            <label for="category_id">Category:</label>
            <select id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $item->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description', $item->description) }}</textarea>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $item->price) }}">
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}">
        </div>

        <div>
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" value="{{ old('sku', $item->sku) }}">
        </div>

        <div>
            <label for="picture">Picture:</label>
            <input type="file" id="picture" name="picture">
            @if ($item->picture)
                <img src="{{ asset('storage/' . $item->picture) }}" alt="Item Picture" width="100">
            @endif
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
