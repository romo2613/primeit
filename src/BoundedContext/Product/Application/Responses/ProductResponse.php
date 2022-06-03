<?php

declare(strict_types=1);


namespace Src\BoundedContext\Product\Application\Responses;

use Src\BoundedContext\Product\Domain\Product;

final class ProductResponse {

    public function __construct(private string $id, private string $name){}

    public static function fromProduct(Product $product): self {

        return new self(
            $product->id()->value(),
            $product->name()->value()
        );
    }

    public function id(): string {

        return $this->id;
    }

    public function name(): string {

        return $this->name;
    }

    public function toArray(): array {

        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
