<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return response()->json($brands);
    }

    public function posItems()
    {
        $brands = Brand::orderBy('brand_name')->get(); // FOR BRAND DROPDOWN IN POS
        return view('POS_SYSTEM.item_list', compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        $validated = $request->validated();
        Brand::create($validated);
        return redirect()->route('product.add')->with('success', 'Brand created successfully.');
    }

    public function create()
    {
        $brands = Brand::all(); // Fetch brands from database
        return view('POS_SYSTEM.item_list', compact('brands'));
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
