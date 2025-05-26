<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\BasketService;
use App\Services\OrderService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(
        protected BasketService $basketService,
        protected OrderService $orderService
    ) {}

    public function __invoke(Request $request)
    {
        $basket = $this->basketService->getOrCreate($request->header('X-Guest-Token'));

        if (!auth()->check()) {
            return response()->json(['error' => 'Authentication required for checkout'], 401);
        }

        $order = $this->orderService->createFromBasket($basket);

        return new OrderResource($order);
    }
}
