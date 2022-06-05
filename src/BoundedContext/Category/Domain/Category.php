<?php

namespace Src\BoundedContext\Category\Domain;

use Src\BoundedContext\Category\Domain\ValueObjects\{
    CategoryId,
    CategoryName,
};

class Category {

    public function __construct(private CategoryId $id, private CategoryName $name) {}


    public static function fromPrimitives(string $id, string $name): self {

        return new self(

            new CategoryId($id),

            new CategoryName($name),

        );

    }

    public static function create(CategoryId $id, CategoryName $name): self {

        return new self($id, $name);

    }

    public function id(): CategoryId {

        return $this->id;

    }

    public function name(): CategoryName {

        return $this->name;

    }

}
