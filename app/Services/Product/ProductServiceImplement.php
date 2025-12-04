<?php

namespace App\Services\Product;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Response;

class ProductServiceImplement extends ServiceApi implements ProductService
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
  protected $product_repository;

  public function __construct(ProductRepository $product_repository)
  {
    $this->product_repository = $product_repository;
  }

  public function create($data): ProductService
  {
    try {
      return $this->setData($this->product_repository->create($data))
        ->setMessage('Created')
        ->setCode(Response::HTTP_CREATED);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function update($id, $data): ProductService
  {
    try {
      return $this->setData($this->product_repository->update($id, $data))
        ->setMessage('Updated')
        ->setCode(Response::HTTP_OK);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function findOrFail($id): ProductService
  {
    try {
      return $this->setData($this->product_repository->findOrFail($id))
        ->setMessage('Data Found !')
        ->setCode(Response::HTTP_FOUND);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function all(): ProductService
  {
    try {
      return $this->setData($this->product_repository->all())
        ->setMessage('Data Found !')
        ->setCode(Response::HTTP_FOUND);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function delete($id): ProductService
  {
    try {
      return $this->setData($this->product_repository->delete($id))
        ->setMessage('Data Deleted !')
        ->setCode(Response::HTTP_OK);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }

  public function getOrders(string|int $id): ProductService
  {
    try {
      return $this->setData($this->product_repository->getOrders($id))
        ->setMessage('ok')
        ->setCode(Response::HTTP_OK);
    } catch (\Exception $exception) {
      return $this->exceptionResponse($exception);
    }
  }
}
