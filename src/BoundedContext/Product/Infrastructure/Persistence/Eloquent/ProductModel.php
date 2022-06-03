<?php

namespace Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\BoundedContext\Product\Domain\Product;

final class ProductModel extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $table = 'products';

    public $incrementing = false;

    // public $timestamps = false;



    public function __construct(array $attributes = [])
    {
        $this->setConnection('mysql');

        parent::__construct($attributes);
    }

    protected static function newFactory(): Factory
    {
        return ProductModelFactory::new();
    }
}
