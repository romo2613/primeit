<?php

namespace Src\User\Domain;

final class Userpassword{

    /**
     * @var string
     */

    private $password;

    public function __construct(string $password){

        $this->password = $password;
    }

    public function password(){

        return $this->password;
    }
}
