<?php

namespace Src\BoundedContext\Category\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Src\BoundedContext\Category\Application\Actions\ListCategories;
use Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class ListCategoriesGetController extends Controller {

    public function __construct(private CategoryRepository $repository){}

    public function __invoke(): JsonResponse {

        $categoriesResponse = (new ListCategories($this->repository))();

        return new JsonResponse(
            [
                'categories' => $categoriesResponse->toArray()
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
