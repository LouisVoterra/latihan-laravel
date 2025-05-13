<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Food extends Model
{
    use HasFactory;

    protected $table = "foods";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function category(): BelongsTo{ //nama function nya category, ngasi tau kalau food itu punya hubungan sama category
        return $this->belongsTo(Category::class,'category_id');
    }

    public function transaction(){
        return $this->belongsToMany(Transaction::class,'food_transaction')
        ->withPivot('quantity','price_at_order')
        ->withTimestamps();
    }
}
