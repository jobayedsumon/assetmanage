<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('pages.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect(route('category.index'))->with('status', 'Category created successfully');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string'
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name
        ]);

        return redirect(route('category.index'))->with('status', 'Category updated successfully');
    }
}
