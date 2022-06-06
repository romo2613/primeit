<?php

namespace Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

final class CategoryModelFactory extends Factory
{
    Protected $model = CategoryModel::class;

    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
        ];
    }
}
