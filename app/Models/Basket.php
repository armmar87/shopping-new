<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'guest_token'];

    public function items()
    {
        return $this->hasMany(BasketItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'basket_items');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

