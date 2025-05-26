<?php

namespace App\Services;

use App\DTOs\ProductDTO;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Collection;
class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository
    ) {}

    public function getAllProducts(): Collection
    {
        return $this->productRepository->all();
    }

    public function storeProduct(ProductDTO $dto)
    {
        return $this->productRepository->create($dto);
    }
}
