<?php

namespace Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\BoundedContext\Category\Domain\Category;

final class CategoryModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'categories';

    public $incrementing = false;

    // public $timestamps = false;



    public function __construct(array $attributes = [])
    {
        $this->setConnection('mysql');

        parent::__construct($attributes);
    }

    protected static function newFactory(): Factory
    {
        return CategoryModelFactory::new();
    }
}
