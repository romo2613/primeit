<?php

namespace Src\BoundedContext\User\Application\Actions;

use Src\BoundedContext\User\Application\Responses\UserResponse;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\UserAlreadyExists;
use Src\BoundedContext\User\Domain\UserRepository;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;


final class CreateUser {

    public function __construct(private UserRepository $repository) {}


    /**
     * @throws UserAlreadyExist
     */

    public function __invoke(string $id, string $name, string $email, string $password): UserResponse {

        $id = new UserId($id);

        $User = $this->repository->find($id);


        if (null !== $User){

            throw new UserAlreadyExists();

        }


        $name = new UserName($name);
        $email = new UserEmail($email);
        $password = new UserPassword($password);

        $user = User::create($id, $name, $email, $password);

        $this->repository->save($user);

        return UserResponse::fromUser($user);
    }
}
