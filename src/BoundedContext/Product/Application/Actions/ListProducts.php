<?php

namespace Src\BoundedContext\Product\Application\Actions;

use Src\BoundedContext\Product\Application\Responses\ProductResponse;
use Src\BoundedContext\Product\Application\Responses\ProductsResponse;
use Src\BoundedContext\Product\Domain\ProductRepository;

class ListProduct {

    private function __construct(private ProductRepository $repository) {}

    public function __invoke(): ProductsResponse
    {
        $products = $this->repository->list();

        return ProductResponse::fromProduct($products);
    }
}
