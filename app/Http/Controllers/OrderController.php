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

    public function update(OrderRequest $request, $id): JsonResponse
    {
        return $this->orderService->update($id, $request->validated())->toJson();
    }

    public function list(): JsonResponse
    {
        return $this->orderService->all()->toJson();
    }

    public function show($id): JsonResponse
    {
        return $this->orderService->findOrFail($id)->toJson();
    }

    public function delete($id): JsonResponse
    {
        return $this->orderService->delete($id)->toJson();
    }
}
