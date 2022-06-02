<?php

namespace Src\BoundedContext\Product\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

final class ProductModelFactory extends Factory
{
    Protected $model = ProductModel::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'name' => $this->faker->company
        ];
    }
}
