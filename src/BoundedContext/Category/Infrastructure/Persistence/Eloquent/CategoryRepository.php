<?php


namespace Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent;

use Src\BoundedContext\Category\Domain\{
    Category,
    Categories,
    CategoryAlreadyExists,
    CategoryRepository as CategoryRepositoryContract,
    ValueObjects\CategoryId,
};

use Src\Shared\Infrastructure\Persistence\Eloquent\EloquentException;
use Exception;
use Illuminate\Support\Facades\DB;

final class CategoryRepository implements CategoryRepositoryContract {

    public function __construct(private CategoryModel $model) {}

    private function toDomain(CategoryModel $eloquentCategoryModel): Category {

        return Category::fromPrimitives(
            $eloquentCategoryModel->id,
            $eloquentCategoryModel->name,
        );
    }


    public function find(CategoryId $id): ?Category {
        $categoryModel = $this->model->find($id->value());

        if (null === $categoryModel) {
            return null;
        }

        return $this->toDomain($categoryModel);
    }


    public function list(): Categories {

        $eloquentCategories = $this->model->all();

        $categories = $eloquentCategories->map(
            function (CategoryModel $eloquentCategory){
                return $this->toDomain($eloquentCategory);
            }
        )->toArray();

        return new Categories($categories);
    }

    public function save(Category $category): void
    {
        $CategoryModel = $this->model->find($category->id()->value());

        if(null === $CategoryModel){

            $CategoryModel = new CategoryModel();
            $CategoryModel->id = $category->id()->value();
        }

        $CategoryModel->name = $category->name()->value();

        DB::beginTransaction();

        try{

            $CategoryModel->save();

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();

            throw new EloquentException(
                $e->getMessage(),
                $e->getCode(),
                $e->getPrevious(),
            );
        }
    }



    public function delete(CategoryId $id): void
    {
        $category = $this->model->findOrFail($id->value());

        // if(null === $Category){

        // }

        $category->delete();
    }

}
