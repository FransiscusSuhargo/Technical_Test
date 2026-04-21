<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockHistories extends Model
{
    /** @use HasFactory<\Database\Factories\StockHistoriesFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'quantity',  
        'stock_after', 
        'note', 
        'bike_part_id',
        'user_id'
    ];

    public function bikePart()
    {
        return $this->belongsTo(BikeParts::class, 'bike_part_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
