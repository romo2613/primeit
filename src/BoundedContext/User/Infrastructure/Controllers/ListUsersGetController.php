<?php

namespace Src\BoundedContext\User\Infrastructure\Controllers;


use App\Http\Controllers\Controller;
use Src\BoundedContext\User\Application\Actions\ListUsers;
use Src\BoundedContext\User\Infrastructure\Persistence\Eloquent\UserRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class ListUsersGetController extends Controller {

    public function __construct(private UserRepository $repository){}

    public function __invoke(): JsonResponse {

        $UsersResponse = (new ListUsers($this->repository))();

        return new JsonResponse(
            [
                'users' => $UsersResponse->toArray()
            ],
            ResponseAlias::HTTP_OK,
        );
    }
}
