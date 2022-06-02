<?php

namespace Src\BoundedContext\Product\Aplication\Responses;

use Src\BoundedContext\Product\Domain\Products;

final class ProductsResponse {

    public function __construct(private array $products) {}


    public static function fromProducts(Products $products): self {

        $productResponses = array_map (

            function ($product) {
                return ProductResponse::fromProduct($product);
            },

            $products->all()
        );

        return new self($productResponses);
    }

    public function toArray(): array {

        return array_map(function (ProductResponse $productResponse){

            return $productResponse->toArray();

        }, $this->products);
    }
}
