<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
      protected $guarded = ['id'];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function deliveries()
    {
        return $this->belongsTo(Delivery::class, 'users_id', 'id');
    }
}
