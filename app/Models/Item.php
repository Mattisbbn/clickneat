<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredients;
use App\Models\Allergens;

class Item extends Model
{
    use HasFactory;
    protected $table = "items";
    protected $fillable = ["name","description","price","cost","is_active","category_id"];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getFormatedPriceAttribute(): string
    {
        return number_format($this->price / 100, 2, ',', ' ') . ' €';
    }
    public function getFormatedCostAttribute(): string
    {
        return number_format($this->cost / 100, 2, ',', ' ') . ' €';
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredients::class);
    }
    public function allergens()
    {
        return $this->hasMany(Allergens::class);
    }
}
