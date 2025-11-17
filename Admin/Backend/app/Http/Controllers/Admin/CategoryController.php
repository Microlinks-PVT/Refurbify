<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import the Str class for slugs

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the data
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'status' => 'required|boolean',
        ]);

        // 2. Create and save the category
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Auto-generate slug
            'status' => $request->status,
        ]);

        // 3. Redirect back with a success message
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        // Not needed for now
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // 1. Validate the data
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                // Make sure the name is unique, but ignore this category's current name
                \Illuminate\Validation\Rule::unique('categories')->ignore($category->id)
            ],
            'status' => 'required|boolean',
        ]);

        // 2. Update the category
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Auto-update slug
            'status' => $request->status,
        ]);

        // 3. Redirect back with a success message
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // The onDelete('cascade') in the migration will
        // automatically delete all sub-categories.
        $category->delete();

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully!');
    }
}