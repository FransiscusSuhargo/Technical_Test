<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    /** @use HasFactory<\Database\Factories\BrandsFactory> */
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function bikeParts(
    ) 
    {
        return $this->hasMany(BikeParts::class, 'brand_id');
    }
}
