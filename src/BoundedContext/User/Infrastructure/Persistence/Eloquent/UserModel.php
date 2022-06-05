<?php

namespace Src\BoundedContext\User\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\BoundedContext\User\Domain\User;

final class UserModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'users';

    public $incrementing = false;


    public function __construct(array $attributes = [])
    {
        $this->setConnection('mysql');

        parent::__construct($attributes);
    }

    protected static function newFactory(): Factory
    {
        return UserModelFactory::new();
    }
}
