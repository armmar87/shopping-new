<?php

namespace App\Repositories\Contracts;


use App\DTOs\ProductDTO;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function all(): Collection;
    public function create(ProductDTO $dto): mixed;
}
