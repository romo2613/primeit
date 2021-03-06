<?php

namespace Src\BoundedContext\Category\Application\Responses;

use Src\BoundedContext\Category\Domain\Categories;

final class CategoriesResponse {

    public function __construct(private array $Categories) {}


    public static function fromCategories(Categories $Categories): self {

        $CategoryResponses = array_map (

            function ($Category) {
                return CategoryResponse::fromCategory($Category);
            },

            $Categories->all()
        );

        return new self($CategoryResponses);
    }

    public function toArray(): array {

        return array_map(function (CategoryResponse $CategoryResponse){

            return $CategoryResponse->toArray();

        }, $this->Categories);
    }
}
