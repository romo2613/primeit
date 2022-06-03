<?php

namespace Src\BoundedContext\Product\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Product\Application\Actions\ListProducts;
use Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent\ProductRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class ListProducsGetController extends Controller {

    public function __construct(private ProductRepository $repository){}

    public function __invoke(): JsonResponse {

        $productsResponse = (new ListProducts($this->repository))();

        return new JsonResponse(
            [
                'products' => $productsResponse->toArray()
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
