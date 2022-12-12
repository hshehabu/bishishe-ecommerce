<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table='product';
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'user_id',
        'quantity',
        'status',
        'gallery'
    ];
        
    public function user(){

        return $this->belongsTo(User::class);
    }
   
}
