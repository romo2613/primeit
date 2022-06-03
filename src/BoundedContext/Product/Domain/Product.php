<?php

namespace Src\BoundedContext\Product\Domain;

use Src\BoundedContext\Product\Domain\ValueObjects\{
    ProductId,
    ProductName,
};

class Product {

    public function __construct(private ProductId $id, private ProductName $name) {}


    public static function fromPrimitives(string $id, string $name): self {

        return new self(

            new ProductId($id),

            new ProductName($name),

        );

    }

    public static function create(ProductId $id, ProductName $name): self {

        return new self($id, $name);

    }

    public function id(): ProductId {

        return $this->id;

    }

    public function name(): ProductName {

        return $this->name;

    }

}
