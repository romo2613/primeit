<?php

namespace Src\BoundedContext\Category\Application\Actions;

use Src\BoundedContext\Category\Application\Responses\CategoriesResponse;
use Src\BoundedContext\Category\Domain\CategoryRepository;

class ListCategories {

    public function __construct(private CategoryRepository $repository) {}

    public function __invoke(): CategoriesResponse
    {
        $categories = $this->repository->list();

        return CategoriesResponse::fromCategories($categories);
    }
}
