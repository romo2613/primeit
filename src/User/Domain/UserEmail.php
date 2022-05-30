<?php

namespace Src\User\Domain;

final class{

/**
 * @var string
 */

    private $email;

    public function __construct(string $email){

        $this->email = $email;
    }

    public function email(){

        return $this->email;
    }
}
