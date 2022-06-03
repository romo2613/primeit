<?php


namespace Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent;

use Src\BoundedContext\Product\Domain\{
    Product,
    Products,
    ProductAlreadyExists,
    ProductRepository as ProductRepositoryContract,
    ValueObjects\ProductId,
};

use Src\Shared\Infrastructure\Persistence\Eloquent\EloquentException;
use Exception;
use Illuminate\Support\Facades\DB;

final class ProductRepository implements ProductRepositoryContract {

    public function __construct(private ProductModel $model) {}

    private function toDomain(ProductModel $eloquentProductModel): Product {

        return Product::fromPrimitives(
            $eloquentProductModel->id,
            $eloquentProductModel->name,
        );
    }


    public function find(ProductId $id): ?Product {
        $ProductModel = $this->model->find($id->value());

        if (null === $ProductModel) {
            return null;
        }

        return $this->toDomain($ProductModel);
    }


    public function list(): Products {

        $eloquentProducts = $this->model->all();

        $products = $eloquentProducts->map(
            function (ProductModel $eloquentProduct){
                return $this->toDomain($eloquentProduct);
            }
        )->toArray();

        return new Products($products);
    }

    public function save(Product $product): void
    {
        $productModel = $this->model->find($product->id()->value());

        if(null === $productModel){

            $productModel = new ProductModel();
            $productModel->id = $product->id()->value();
        }

        $productModel->name = $product->name()->value();

        DB::beginTransaction();

        try{

            $productModel->save();

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



    public function delete(ProductId $id): void
    {
        $product = $this->model->findOrFail($id->value());

        // if(null === $product){

        // }

        $product->delete();
    }

}
