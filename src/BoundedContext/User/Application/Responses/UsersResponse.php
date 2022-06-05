<?php

namespace Src\BoundedContext\User\Application\Responses;

use Src\BoundedContext\User\Domain\Users;

final class UsersResponse {

    public function __construct(private array $users) {}


    public static function fromUsers(Users $Users): self {

        $userResponses = array_map (

            function ($user) {
                return UserResponse::fromUser($user);
            },

            $Users->all()
        );

        return new self($userResponses);
    }

    public function toArray(): array {

        return array_map(function (UserResponse $userResponse){

            return $userResponse->toArray();

        }, $this->users);
    }
}
