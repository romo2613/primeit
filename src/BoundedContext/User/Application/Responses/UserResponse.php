<?php

declare(strict_types=1);


namespace Src\BoundedContext\User\Application\Responses;

use Src\BoundedContext\User\Domain\User;

final class UserResponse {

    public function __construct(

        private string $id,
        private string $name,
        private string $email

    ){}

    public static function fromUser(User $user): self {

        return new self(
            $user->id()->value(),
            $user->name()->value(),
            $user->email()->value(),
        );
    }

    public function id(): string {

        return $this->id;
    }

    public function name(): string {

        return $this->name;
    }

    public function email(): string {

        return $this->email;

    }

    public function toArray(): array {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
