<?php

use Src\BoundedContext\category\Application\Actions\Listcategorys;
use Src\BoundedContext\category\Infrastructure\Persistence\Eloquent\categoryRepository;
use Illuminate\Support\Facades\Artisan;
use Src\BoundedContext\category\Domain\category;
use Src\BoundedContext\category\Infrastructure\Persistence\Eloquent\categoryModelFactory;

Artisan::command("primeit:list-categories", function (categoryRepository $repository){

    $categoryResponse = (new Listcategories($repository))();

    $headers = ["Id", "category"];

    $this->table($headers, $categoryResponse->toArray());

});

Artisan::command("primeit:generate-categories", function (){

    $categoryFactory = new CategoryModelFactory(20);
    $categoryFactory->create();

});
