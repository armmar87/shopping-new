<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Basket;
use App\Enums\CalculationType;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function createFromBasket(Basket $basket): Order
    {
        $user = $basket->user;
        if (! $user) {
            throw new \Exception('Only authenticated users can checkout.');
        }

        $products = $basket->products;
        $calcType = $user->calculation_type ?? CalculationType::WITH_TAX;

        return DB::transaction(function () use ($user, $products, $calcType, $basket) {
            $order = Order::create(['user_id' => $user->id]);

            foreach ($products as $product) {
                $price = $this->calculatePrice($product->price, $calcType);
                $order->products()->attach($product->id, ['price' => $price]);
            }

            $basket->items()->delete(); // Clear basket after order

            return $order;
        });
    }

    private function calculatePrice(float $price, CalculationType $type): float
    {
        return $type === CalculationType::WITH_TAX
            ? round($price * 1.2, 2)
            : $price;
    }
}
