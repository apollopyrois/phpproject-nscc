<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
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

    {{--item submit--}}
    <form action="/items" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="category">Category:</label>
            <select id="category" name="category_id">
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}">
            @error('quantity')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="sku">SKU Number:</label>
            <input type="text" id="sku" name="sku" value="{{ old('sku') }}">
            @error('sku')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="picture">Picture:</label>
            <input type="file" id="picture" name="picture" accept="image/*">
            @error('picture')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
