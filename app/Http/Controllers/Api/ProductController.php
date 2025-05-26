<?php

namespace App\Http\Controllers\Api;

use App\DTOs\ProductDTO;
use App\Enums\ProductType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStore;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return ProductResource::collection($products);
    }

    public function store(ProductStore $request)
    {
        $validated = $request->validated();

        $dto = new ProductDTO(
            name: $validated['name'],
            price: $validated['price'],
            type: ProductType::from($validated['type']),
            dimension: $validated['dimension'] ?? null,
        );

        $product = $this->productService->storeProduct($dto);

        return new ProductResource($product);
    }
}
