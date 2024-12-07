<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //error check
        $request->validate([
            'name' => 'required|unique:categories,name',
        ], [
            'name.required' => 'Please enter a name first.',
            'name.unique' => 'Name already exists.',
        ]);

        // Create a new category
        Category::create([
            'name' => $request->input('name'),
        ]);

        // Redirect to the categories list
        return redirect()->route('categories.index')->with('success', 'Category created.');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
}

