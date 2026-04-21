<?php

namespace App\Http\Controllers;

use App\Models\BikeParts;
use App\Http\Requests\StoreBikePartsRequest;
use App\Http\Requests\UpdateBikePartsRequest;
use App\Models\StockHistories;
use App\Models\Category; 
use App\Models\Brands; 
use Illuminate\Http\Request; 

class BikePartsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
     {
        $bikeParts = BikeParts::with(['category', 'brand'])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($request->input('category_id'), function ($query, $category) {
                $query->whereHas('category', function ($q) use ($category) {
                    $q->where('id', $category);
                });
            })
            ->when($request->input('brand_id'), function ($query, $brand) {
                $query->whereHas('brand', function ($q) use ($brand) {
                    $q->where('id', $brand);
                });
            })->get(); 

            $categories = Category::all(); 
            $brands = Brands::all();

            return view('bikeparts.index', compact('bikeParts', 'categories', 'brands'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $brands = Brands::all();
        return view('bikeparts.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'stok' => 'required|integer|min:0',
        ]);

        $bikePart = BikeParts::create($request->all()); 
        $stockHistory = StockHistories::create([
            'user_id' => auth()->id(), 
            'bike_part_id' => $bikePart->id,
            'quantity' => $request->stok,
            'stock_after' => $request->stok,
            'type' => 'in',
            'note' => 'Initial stock',
        ]);

        return redirect()->route('bikeparts.index')->with('success', 'Bike part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($bikeParts)
    {
        $bikePart = BikeParts::with(['category', 'brand', 'stockHistories.user'])->find($bikeParts);
        return view('bikeparts.show', compact('bikePart'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bikeParts)
    {
        $categories = Category::all();
        $brands = Brands::all();
        $bikeParts = BikeParts::find($bikeParts);
        return view('bikeparts.edit', compact('bikeParts', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $bikeParts)
    {
        $bikeParts = BikeParts::find($bikeParts);
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);

        $bikeParts->update($request->all());
        return redirect()->route('bikeparts.index')->with('success', 'Bike part updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BikeParts $bikeParts)
    {
        $bikeParts->delete();
        return redirect()->route('bikeparts.index')->with('success', 'Bike part deleted successfully.');
    }
}
