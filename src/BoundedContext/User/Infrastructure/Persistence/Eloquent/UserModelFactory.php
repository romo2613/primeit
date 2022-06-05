<?php

namespace Src\BoundedContext\User\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\Factory;

final class UserModelFactory extends Factory
{
    Protected $model = UserModel::class;

    public function definition(): array
    {
        return [
            'id'        => $this->faker->uuid,
            'name'      => $this->faker->company,
            'email'     => $this->faker->unique()->email,
            'password'  => bcrypt('12345678')
        ];
    }
}
