<?php

namespace Src\BoundedContext\Category\Infrastructure\Persistence\Eloquent;

use Illuminate\Support\Facades\DB;
use Src\Shared\Infrastructure\RamseyUuidGenerator;

final class CategoryModelSeeder{


    public function seeder()
    {

        DB::table('categories')->insert([
            'id' => (new RamseyUuidGenerator)->generate(),
            'name' => 'smartphones',
        ]);

    }

}
