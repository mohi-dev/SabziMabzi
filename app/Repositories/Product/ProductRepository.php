<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Repository;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepository extends Repository
{
    public function getOrders(string|int $id): ?Collection;
}
