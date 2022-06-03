<?php

namespace Src\User\Domain;

final class UpdateUserUseCase
{
    public function __construct()
    {

    }

    public function execute(int $id, string $email, string $name)
    {
        $user = new UserEntity(
            new UserId($id),
            new UserEmail($email),
            new UserName($name)
        );
    }
}

