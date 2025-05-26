<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\DTOs\ProductDTO;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\ProductRepositoryInterface;
class ProductRepository implements ProductRepositoryInterface
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function create(ProductDTO $dto): Product
    {
        return Product::create([
            'name' => $dto->name,
            'price' => $dto->price,
            'type' => $dto->type,
            'dimension' => $dto->dimension,
        ]);
    }
}
