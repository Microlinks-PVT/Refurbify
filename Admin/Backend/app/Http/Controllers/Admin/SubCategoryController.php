<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eager load the parent category relationship
        $subCategories = SubCategory::with('category')->latest()->get();
        return view('admin.subcategories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all active categories to pass to the dropdown
        $categories = Category::where('status', true)->orderBy('name')->get();
        return view('admin.subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the data
        $request->validate([
            'name' => 'required|string|max:255|unique:sub_categories',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ]);

        // 2. Create and save the sub-category
        SubCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Auto-generate slug
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        // 3. Redirect back with a success message
        return redirect()->route('admin.subcategories.index')
                         ->with('success', 'Sub-Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        // We will add this later
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        // We will add this later
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        // We will add this later
    }
}