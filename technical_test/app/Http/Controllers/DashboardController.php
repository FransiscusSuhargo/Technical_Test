<?php

namespace App\Http\Controllers;

use App\Models\BikeParts;
use App\Models\Category; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $stock = Category::withSum('bikeParts', 'stok')->get(); 
        $lowStock = BikeParts::with('category', 'brand')
            ->orderBy('stok', 'asc')
            ->limit(5)
            ->get();
            
        return view('dashboard', compact('stock', 'lowStock'));
    }
}
