<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergens extends Model
{
    use HasFactory;
    protected $table = "allergens";

    protected $fillable = ["name","item_id"];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
