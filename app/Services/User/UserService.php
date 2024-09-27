<?php

namespace App\Services\User;

use LaravelEasyRepository\BaseService;

interface UserService extends BaseService
{

    public function findByEmail(string $email): UserService;
    public function getRelatedOrders(string|int $id): UserService;
}
