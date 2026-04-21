<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeParts extends Model
{
    /** @use HasFactory<\Database\Factories\BikePartsFactory> */
    use HasFactory;

    protected $fillable = [
        'name', 
        'harga', 
        'stok', 
        'category_id',
        'brand_id'
    ]; 

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function stockHistories()
    {
        return $this->hasMany(StockHistories::class, 'bike_part_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brands::class, 'brand_id');
    }
}
