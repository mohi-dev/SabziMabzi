<?php

namespace App\Repositories\User;

use App\Models\Order;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class UserRepositoryImplement extends Eloquent implements UserRepository
{

    /**
     * Model class to be used in this repository for the common methods inside Eloquent
     * Don't remove or change $this->model variable name
     * @property Model|mixed $model;
     */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function getRelatedOrders(string|int $id): ?Collection
    {
        $user = $this->findOrFail($id);
        return $user->orders;
    }
}
