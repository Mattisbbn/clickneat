<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
        protected $table = 'ingredients';
    protected $fillable = ['name', 'description', 'price'];


    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
