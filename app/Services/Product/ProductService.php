<?php

namespace App\Services\Product;

use LaravelEasyRepository\BaseService;

interface ProductService extends BaseService
{
    public function getOrders(string|int $id): ProductService;
}
