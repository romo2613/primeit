<?php

use Src\BoundedContext\Category\Application\Actions\Listcategories;
use Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent\categoryRepository;
use Illuminate\Support\Facades\Artisan;
use Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent\CategoryModelSeeder;

Artisan::command("primeit:list-categories", function (CategoryRepository $repository){

    $categoryResponse = (new ListCategories($repository))();

    $headers = ["Id", "category"];

    $this->table($headers, $categoryResponse->toArray());

});

Artisan::command("primeit:generate-categories", function (){

    (new CategoryModelSeeder())->seeder();

});
