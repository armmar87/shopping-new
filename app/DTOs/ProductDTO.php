<?php

namespace App\DTOs;

use App\Enums\ProductType;

class ProductDTO
{
    public function __construct(
        public string $name,
        public float $price,
        public ProductType $type,
        public ?string $dimension = null,
    ) {}
}
