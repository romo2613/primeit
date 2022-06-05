<?php

namespace Src\BoundedContext\User\Domain;

use Src\Shared\Domain\DomainException;
use Throwable;

final class UserAlreadyExists extends DomainException {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {

        $message = "" === $message ? "user already exists" : $message;

        parent::__construct($message, $code, $previous);
    }
}
