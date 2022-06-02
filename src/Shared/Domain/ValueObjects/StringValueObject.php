<?php

declare(strict_types=1);

namespace Src\Shared\Domain\ValueObjects;

abstract class StringValueObject
{
    public function __construct(protected string $value){}

    public function value(): string {

        return $this->value;
    }
}
