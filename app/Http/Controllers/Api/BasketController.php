<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBasket;
use App\Http\Resources\ProductResource;
use App\Services\BasketService;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function __construct(protected BasketService $basketService) {}

    protected function resolveBasket(Request $request)
    {
        return $this->basketService->getOrCreate($request->header('X-Guest-Token'));
    }

    public function index(Request $request)
    {
        $basket = $this->resolveBasket($request);

        return ProductResource::collection($this->basketService->getProducts($basket));
    }

    public function add(ProductBasket $request)
    {
        $basket = $this->resolveBasket($request);
        $this->basketService->addProduct($basket, $request->product_id);

        return response()->json(['message' => 'Added']);
    }

    public function remove(ProductBasket $request)
    {
        $basket = $this->resolveBasket($request);
        $this->basketService->removeProduct($basket, $request->product_id);

        return response()->json(['message' => 'Removed']);
    }

    public function clear(Request $request)
    {
        $basket = $this->resolveBasket($request);
        $this->basketService->clear($basket);

        return response()->json(['message' => 'Cleared']);
    }
}
