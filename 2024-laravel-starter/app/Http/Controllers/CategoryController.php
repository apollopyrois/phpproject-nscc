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

        //creates category
        Category::create([
            'name' => $request->input('name'),
        ]);

        //redirect
        return redirect()->route('categories.index')->with('success', 'Category created.');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

}

