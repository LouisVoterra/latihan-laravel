<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transaction";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'customer_name',
        'total_price',
        'transaction_date',
        'created_at',
        'updated_at'
    ];

    public function foods(){
        return $this->belongsToMany(Food::class,'food_transaction')
        ->withPivot('quantity','price_at_order')
        ->withTimestamps();
    }
}
