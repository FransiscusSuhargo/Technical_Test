<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Http\Requests\StoreBrandsRequest;
use App\Http\Requests\UpdateBrandsRequest;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brands::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandsRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brands::create($request->all());
        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brands $brands)
    {
        return view('brands.show', compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brands $brands)
    {
        return view('brands.edit', compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandsRequest $request, Brands $brands)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brands->update($request->all());
        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brands $brands)
    {
        $brands->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
