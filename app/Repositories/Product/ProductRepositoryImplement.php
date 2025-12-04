<?php

namespace App\Repositories\Product;

use LaravelEasyRepository\Implementations\Eloquent;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

class ProductRepositoryImplement extends Eloquent implements ProductRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getOrders(string|int $id): ?Collection
    {
        $product = $this->findOrFail($id);
        return $product->orders;
    }
}
