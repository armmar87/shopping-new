<?php

namespace App\Services;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BasketService
{
    public function getOrCreate(?string $guestToken = null): Basket
    {
        if (Auth::check()) {
            return Basket::firstOrCreate(['user_id' => Auth::id()]);
        }

        return Basket::firstOrCreate(['guest_token' => $guestToken]);
    }

    public function addProduct(Basket $basket, int $productId): void
    {
        $basket->items()->firstOrCreate(['product_id' => $productId]);
    }

    public function removeProduct(Basket $basket, int $productId): void
    {
        $basket->items()->where('product_id', $productId)->delete();
    }

    public function clear(Basket $basket): void
    {
        $basket->items()->delete();
    }

    public function getProducts(Basket $basket)
    {
        return $basket->products()->get();
    }
}
