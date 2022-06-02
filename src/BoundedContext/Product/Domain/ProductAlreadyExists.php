<?php

namespace Src\BoundedContext\Product\Domain;

use Src\Shared\Domain\DomainException;
use Throwable;

final class ProductAlreadyExists extends DomainException {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {

        $message = "" === $message ? "Product already exists" : $message;

        parent::__construct($message, $code, $previous);
    }
}
