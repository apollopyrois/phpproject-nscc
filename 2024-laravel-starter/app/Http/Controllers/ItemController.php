<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //error check
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'sku' => 'required|string|max:50|unique:items,sku',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //image upload
        $imagePath = $request->file('picture')->store('images', 'public');

        //creates the item
        Item::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'sku' => $request->sku,
            'picture' => $imagePath,
        ]);

        //redirect
        return redirect('/items')->with('success', 'Item added successfully!');
    }
    
    public function index()
    {
        $items = Item::with('category')->get();
        return view('items.index', compact('items'));
    }

}
