<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    //SoftDelete merupakan library yang berfungsi melakukan penghapusan data tetapi tidak secara utuh, artinya
     //data tersebut seolah olah tersimpan di recycle bin sehingga memungkinkan terhindar dari foreign key constraint

    protected $table = "categories";  //agar laravel tidak bingung nyari table categories

    protected $primaryKey = "id";
    public $timestamps = false;

    

    public function foods(): HasMany{ //nama function nya foods, ngasi tau kalau category itu one to many ke food
        return $this->hasMany(Food::class,'category_id','id'); //categort one to mant dengan food, parameter ke 2 itu foreign key, dan ke 3 itu primary key nya category, dicocokkan
    }
}

