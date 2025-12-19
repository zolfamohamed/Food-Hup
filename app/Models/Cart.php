<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
        protected $table = 'cart_items';

    protected $fillable = ['user_id', 'meal_id', 'quantity'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
