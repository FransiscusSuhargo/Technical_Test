<?php

namespace App\Http\Controllers;

use App\Models\StockHistories;
use App\Http\Requests\StoreStockHistoriesRequest;
use App\Http\Requests\UpdateStockHistoriesRequest;
use Illuminate\Http\Request; 
use App\Models\BikeParts;

class StockHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($bikePartId)
    {
        $bikePart = BikeParts::find($bikePartId); 
        return view('stock_history.create', compact('bikePart'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:255',
            'bike_part_id' => 'required|exists:bike_parts,id',
        ]);
        $bikePart = BikeParts::find($request->bike_part_id);
        StockHistories::create([
            'user_id' => auth()->id(),
            'type' => $request->type,
            'quantity' => $request->quantity,
            'note' => $request->note,
            'stock_after' => $request->type === 'in' ? $bikePart->stok + $request->quantity : $bikePart->stok - $request->quantity,
            'bike_part_id' => $request->bike_part_id
        ]);

        $bikePart->update([
            'stok' => $request->type === 'in' ? $bikePart->stok + $request->quantity : $bikePart->stok - $request->quantity
        ]);
        return redirect()->route('bikeparts.show', $request->bike_part_id)->with('success', 'Stock history updated successfully.');
    }   

    /**
     * Display the specified resource.
     */
    public function show(StockHistories $stockHistories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockHistories $stockHistories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockHistoriesRequest $request, StockHistories $stockHistories)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockHistories $stockHistories)
    {
        //
    }
}
