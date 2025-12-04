<?php

namespace App\Services\User;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class UserServiceImplement extends ServiceApi implements UserService
{

  /**
   * set title message api for CRUD
   * @param string $title
   */
  protected $title = "";
  /**
   * uncomment this to override the default message
   * protected $create_message = "";
   * protected $update_message = "";
   * protected $delete_message = "";
   */

  /**
   * don't change $this->mainRepository variable name
   * because used in extends service class
   */
  protected $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function create($data)
  {
    try {
      return $this->setData($this->userRepository->create($data))
        ->setMessage('Created')
        ->setCode(Response::HTTP_CREATED);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function update($id, array $data)
  {
    try {
      return $this->setData($this->userRepository->update($id, $data))
        ->setMessage('Updated !')
        ->setCode(Response::HTTP_OK);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function getRelatedOrders($id): UserService
  {
    try {
      return $this->setData($this->userRepository->getRelatedOrders($id))
        ->setMessage('ok')
        ->setCode(Response::HTTP_OK);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }
}
