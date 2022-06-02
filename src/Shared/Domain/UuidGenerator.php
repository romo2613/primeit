<?php

namespace Src\Shared\Domain;

interface UuidGenerator {

    public function generate(): string;

}
