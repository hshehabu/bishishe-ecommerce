<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public $table= 'product';
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category',
        'price',
        'gallery',
    ];
}
