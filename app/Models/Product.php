<?php

namespace App\Models;

use App\Enums\ProductType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => ProductType::class,
        'price' => 'decimal:2',
    ];

    protected $fillable = ['name', 'price', 'dimension', 'type'];
}
