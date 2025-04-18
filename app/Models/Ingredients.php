<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;
    protected $table = "ingredients";

    protected $fillable = ["name","item_id"];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
