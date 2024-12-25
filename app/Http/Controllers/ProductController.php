<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\Product\ProductService;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * show all
     */

    public function store(ProductRequest $request): JsonResponse
    {
        return $this->productService->create($request->validated())->toJson();
    }

    public function update(ProductRequest $request, $id): JsonResponse
    {
        return $this->productService->update($id, $request->validated())->toJson();
    }

    public function show(): JsonResponse
    {
        return $this->productService->findByEmail('mohammad@gmail.comw')->toJson();
    }
}
