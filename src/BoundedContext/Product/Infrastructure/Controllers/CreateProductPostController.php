<?php

namespace Src\BoundedContext\Product\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Product\Application\Actions\CreateProduct;
use Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent\ProductRepository;
use Src\Shared\Domain\UuidGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateProductPostController extends Controller{

    public function __construct(
        private UuidGenerator $uuidGenerator,
        private ProductRepository $repository,
    ){}

    /**
     * @throws
     */

    public function __invoke(Request $request): JsonResponse {

        $id = $request->get('id', $this->uuidGenerator->generate());

        $productResponse = (new CreateProduct($this->repository))(
            $id,
            $request->get('name')
        );

        return new JsonResponse(
            [
                'product' => $productResponse->toArray(),
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
