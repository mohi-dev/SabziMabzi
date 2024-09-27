<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * show all
     */
    public function show(): JsonResponse
    {
        return $this->userService->findByEmail('mohammad@gmail.comw')->toJson();
        // more action
    }

    public function store(UserRequest $request): JsonResponse
    {
        return $this->userService->create($request->validated())->toJson();
    }

    public function relation(string|int $id): JsonResponse
    {
        return $this->userService->getRelatedOrders($id)->toJson();
    }
}
