<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    use HasFactory;

    protected $table = "categories";  //agar laravel tidak bingung nyari table categories

    protected $primaryKey = "id";
    public $timestamps = true;

    

    public function foods(): HasMany{ //nama function nya foods, ngasi tau kalau category itu one to many ke food
        return $this->hasMany(Food::class,'category_id','id'); //categort one to mant dengan food, parameter ke 2 itu foreign key, dan ke 3 itu primary key nya category, dicocokkan
    }
}

