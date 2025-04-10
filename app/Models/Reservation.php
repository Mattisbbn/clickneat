<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservations";
    protected $fillable = ["table_id","start_time","end_time"];

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
