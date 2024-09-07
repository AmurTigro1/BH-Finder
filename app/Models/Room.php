<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'occupancy', 'price', 'type', 'boarding_house_id'];
    public function boardingHouse()
    {
        return $this->belongsTo(BoardingHouse::class);
    }
}
