<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function Product(){
        return $this->belongsToMany(Product::class);
    }

    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function scopeFindCategoryName($query, $category){
        return $query->where('name', $category);
    }
}
