<?php

namespace Src\User\Domain;

final class UserEmail{

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
