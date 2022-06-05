<?php

namespace Src\BoundedContext\User\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Src\BoundedContext\User\Application\Actions\CreateUser;
use Src\BoundedContext\User\Infrastructure\Persistence\Eloquent\UserRepository;
use Src\Shared\Domain\UuidGenerator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreateUserPostController extends Controller{

    public function __construct(
        private UuidGenerator $uuidGenerator,
        private UserRepository $repository,
    ){}

    /**
     * @throws
     */

    public function __invoke(Request $request): JsonResponse {

        $id = $request->get('id', $this->uuidGenerator->generate());

        $userResponse = (new CreateUser($this->repository))(
            $id,
            $request->get('name'),
            $request->get('email'),
            bcrypt($request->get('password'))
        );

        return new JsonResponse(
            [
                'user' => $userResponse->toArray(),
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
