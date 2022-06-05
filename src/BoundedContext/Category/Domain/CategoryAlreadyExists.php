<?php

namespace Src\BoundedContext\Category\Domain;

use Src\Shared\Domain\DomainException;
use Throwable;

final class CategoryAlreadyExists extends DomainException {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {

        $message = "" === $message ? "Category already exists" : $message;

        parent::__construct($message, $code, $previous);
    }
}
