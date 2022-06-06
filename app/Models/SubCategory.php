<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    public function product(){
        return $this->belongsToMany(Porduct::class);
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }
}
