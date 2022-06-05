<?php

namespace Src\BoundedContext\User\Application\Actions;

use Src\BoundedContext\User\Application\Responses\UsersResponse;
use Src\BoundedContext\User\Domain\UserRepository;

class ListUsers {

    public function __construct(private UserRepository $repository) {}

    public function __invoke(): UsersResponse
    {
        $users = $this->repository->list();

        return UsersResponse::fromUsers($users);
    }
}
