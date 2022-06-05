<?php

namespace Src\BoundedContext\User\Domain;

use Src\BoundedContext\User\Domain\ValueObjects\UserId;


interface UserRepository {

    public function list(): Users;

    public function save(User $user): void;

    public function find(UserId $id): ?User;

    public function delete(UserId $id): void;

}
