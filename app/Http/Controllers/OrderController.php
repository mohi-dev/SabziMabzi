<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * show all
     */

    public function store(OrderRequest $request): JsonResponse
    {
        return $this->orderService->create($request->validated())->toJson();
    }
}
