<?php

namespace Src\BoundedContext\Category\Domain;

use Src\BoundedContext\Category\Domain\ValueObjects\CategoryId;


interface CategoryRepository {

    public function list(): Categories;

    public function save(Category $Category): void;

    public function find(CategoryId $id): ?Category;

    public function delete(CategoryId $id): void;

}
