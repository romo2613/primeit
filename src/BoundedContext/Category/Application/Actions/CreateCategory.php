<?php

namespace Src\BoundedContext\Category\Application\Actions;

use Src\BoundedContext\Category\Application\Responses\CategoryResponse;
use Src\BoundedContext\Category\Domain\Category;
use Src\BoundedContext\Category\Domain\CategoryAlreadyExists;
use Src\BoundedContext\Category\Domain\CategoryRepository;
use Src\BoundedContext\Category\Domain\ValueObjects\CategoryId;
use Src\BoundedContext\Category\Domain\ValueObjects\CategoryName;

final class CreateCategory {

    public function __construct(private CategoryRepository $repository) {}


    /**
     * @throws CategoryAlreadyExist
     */

    public function __invoke(string $id, string $name): CategoryResponse {

        $id = new CategoryId($id);

        $Category = $this->repository->find($id);


        if (null !== $Category){

            throw new CategoryAlreadyExists();

        }


        $name = new CategoryName($name);

        $Category = Category::create($id, $name);

        $this->repository->save($Category);

        return CategoryResponse::fromCategory($Category);
    }
}
