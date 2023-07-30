<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'price',
        'discount',
        'previous_price',
        'img_url',
        'created_at',
        'updated_at',
    ];
}
