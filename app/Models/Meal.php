<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = 'meals';

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];
}
