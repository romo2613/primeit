<?php

namespace Src\User\Domain;

final class UserName{

    /**
     * @var string
     */

    private $name;

    public function __construct(string $name){

        $this->name = $name;
    }

    public function name(){

        return $this->name;
    }
}
