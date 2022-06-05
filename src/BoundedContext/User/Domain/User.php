<?php

namespace Src\BoundedContext\User\Domain;

use Src\BoundedContext\User\Domain\ValueObjects\{
    UserId,
    UserName,
    UserEmail,
    UserPassword
};

class User {

    public function __construct(

        private UserId $id,
        private UserName $name,
        private UserEmail $email,
        private UserPassword $password

    ) {}


    public static function fromPrimitives(string $id, string $name, string $email, string $password): self {

        return new self(

            new UserId($id),
            new UserName($name),
            new UserEmail($email),
            new UserPassword($password)

        );

    }

    public static function create(UserId $id, UserName $name, UserEmail $email, UserPassword $password): self {

        return new self($id, $name, $email, $password);

    }

    public function id(): UserId {

        return $this->id;

    }

    public function name(): UserName {

        return $this->name;

    }

    public function email(): UserEmail {

        return $this->email;

    }

    public function password(): UserPassword {

        return $this->password;

    }

}
