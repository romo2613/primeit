<?php

namespace Src\BoundedContext\Category\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Src\BoundedContext\Category\Application\Actions\CreateCategory;
use Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent\CategoryRepository;
use Src\Shared\Domain\UuidGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateCategoryPostController extends Controller{

    public function __construct(
        private UuidGenerator $uuidGenerator,
        private CategoryRepository $repository,
    ){}

    /**
     * @throws
     */

    public function __invoke(Request $request): JsonResponse {

        $id = $request->get('id', $this->uuidGenerator->generate());

        $categoryResponse = (new CreateCategory($this->repository))(
            $id,
            $request->get('name')
        );

        return new JsonResponse(
            [
                'category' => $categoryResponse->toArray(),
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
