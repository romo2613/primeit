<?php

namespace Src\User\Domain;

final class UserIs{

    /**
     * @var int
     */


     private $id;

    public function __construct($id){

       $this->id = $id;
    }

    public function id(){

        return $this->id;
    }
}
