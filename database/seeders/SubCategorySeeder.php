<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategory = [
            'smartphones' => [
                'android',
                'ios'
            ],
            'ordenadores' => [
                'windows',
                'mac'
            ]
        ];

        foreach ($subcategory as $key => $subCategories) {

            $category = Category::FindCategoryName($key)->first();

            foreach ($subCategories as $subCategoryName) {
                $subCategoryModel = new SubCategory;
                $subCategoryModel->name = $subCategoryName;
                $subCategoryModel->category_id = $category->id;
                $subCategoryModel->save();
            }

        }

        foreach (Product::all() as $product) {
            $product->subCategories()->attach(mt_rand(1, SubCategory::count()));
        }

    }
}
