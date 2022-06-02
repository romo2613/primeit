<?php

namespace Src\BoundedContext\Product\Domain;

use Src\BoundedContext\Product\Domain\ValueObjects\ProductId;


interface ProductRepository {

    public function list(): Products;

    public function save(Product $product): void;

    public function find(ProductId $id): ?Product;

    public function delete(ProductId $id): void;

}
