<?php

declare(strict_types=1);

namespace Src\Shared\Domain;

abstract class Collection implements CollectionInterface
{

    public function __construct(private array $items = []){}

    public function all(): array {

        return $this->items;

    }
}
