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

  public function findByEmail(string $email): UserService
  {
    try {
      $result = $this->userRepository->findByEmail($email);
      if (is_null($result)) {
        return $this->setCode(404)
          ->setMessage('Not Found')
          ->setError('kire khar');
      }
      return $this->setCode(200)
        ->setMessage("OK")
        ->setData($result);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
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

  // Define your custom methods :)
}
