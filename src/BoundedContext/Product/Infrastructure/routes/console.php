<?php

use Src\BoundedContext\Product\Application\Actions\ListProducts;
use Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent\ProductRepository;
use Illuminate\Support\Facades\Artisan;
use Src\BoundedContext\Product\Domain\Product;
use Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent\ProductModelFactory;

Artisan::command("primeit:list-products", function (ProductRepository $repository){

    $productResponse = (new ListProducts($repository))();

    $headers = ["Id", "Product"];

    $this->table($headers, $productResponse->toArray());

});

Artisan::command("primeit:generate-products", function (){

    $productFactory = new ProductModelFactory(20);
    $productFactory->create();

});
