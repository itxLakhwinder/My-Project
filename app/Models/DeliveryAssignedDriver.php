<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryAssignedDriver extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }
}
