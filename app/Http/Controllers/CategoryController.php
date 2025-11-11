<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        return redirect()->route('product.add')->with('success', 'Category created successfully.');
    }

    public function getCategories()
    {
        $categories = Category::orderBy('category_name')->get();
        $brands = Brand::orderBy('brand_name')->get();

        return view('POS_SYSTEM.item_list', compact('categories', 'brands'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
