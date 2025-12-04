<?php

namespace App\Repositories\User;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface UserRepository extends Repository
{

    public function getRelatedOrders(string|int $id): ?Collection;
}
