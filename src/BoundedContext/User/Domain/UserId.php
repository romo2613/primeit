<?php

namespace Src\User\Domain;

final class UserId{

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

    /**
     * @param int $id
     */

    public function setId(int $id): void
    {
        if($id < 0){
            throw new IdNotFound($id);
        }

        $this->id = $id;
    }
}
