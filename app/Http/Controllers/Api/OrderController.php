<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __invoke(Request $request)
    {
        $orders = $request->user()->orders()->with('products')->latest()->get();

        return OrderResource::collection($orders);
    }
}

