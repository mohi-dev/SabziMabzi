<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{

    public function getRelatedOrders(string|int $id): UserService;
}
