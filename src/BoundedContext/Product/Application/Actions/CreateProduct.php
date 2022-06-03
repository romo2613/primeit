<?php

namespace Src\BoundedContext\Product\Application\Actions;

use Src\BoundedContext\Product\Application\Responses\ProductResponse;
use Src\BoundedContext\Product\Domain\Product;
use Src\BoundedContext\Product\Domain\ProductAlreadyExists;
use Src\BoundedContext\Product\Domain\ProductRepository;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;
use Src\BoundedContext\Product\Domain\ValueObjects\ProductName;

final class CreateProduct {

    public function __construct(private ProductRepository $repository) {}


    /**
     * @throws ProductAlreadyExist
     */

    public function __invoke(string $id, string $name): ProductResponse {

        $id = new ProductId($id);

        $product = $this->repository->find($id);


        if (null !== $product){

            throw new ProductAlreadyExists();

        }


        $name = new ProductName($name);

        $product = Product::create($id, $name);

        $this->repository->save($product);

        return ProductResponse::fromProduct($product);
    }
}
