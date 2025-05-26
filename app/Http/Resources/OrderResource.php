<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user->username,
            'products' => $this->products->map(fn ($product) => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => (float) $product->pivot->price,
            ]),
            'total' => $this->products->sum(fn ($product) => $product->pivot->price),
        ];
    }
}
