<?php

declare(strict_types=1);


namespace Src\BoundedContext\Category\Application\Responses;

use Src\BoundedContext\Category\Domain\Category;

final class CategoryResponse {

    public function __construct(private string $id, private string $name){}

    public static function fromCategory(Category $category): self {

        return new self(
            $category->id()->value(),
            $category->name()->value()
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
