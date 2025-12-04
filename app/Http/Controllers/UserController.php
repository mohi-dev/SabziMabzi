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

    public function store(UserRequest $request): JsonResponse
    {
        return $this->userService->create($request->validated())->toJson();
    }

    public function update(UserRequest $request, $id): JsonResponse
    {
        return $this->userService->update($id, $request->validated())->toJson();
    }

    public function list()
    {
        return $this->userService->all()->toJson();
    }

    public function relation(string|int $id): JsonResponse
    {
        return $this->userService->getRelatedOrders($id)->toJson();
    }
}
