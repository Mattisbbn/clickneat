<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
enum OrderStatus: string {
    case Pending = 'pending';
    case Paid = 'paid';
    case Preparing = 'preparing';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}

class Order extends Model
{

    protected $table = "orders";
    protected $fillable = ["user_id","reservation_id","restaurant_id","note","status"];

    protected $casts = [
        "status" => OrderStatus::class
    ];


    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function total()
    {
        return number_format($this->orderItems()->sum('price') / 100, 2, ',', ' ') . ' €';
    }
}
