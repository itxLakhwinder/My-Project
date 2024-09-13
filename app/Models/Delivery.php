<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'time', 'date', 'pick_date', 'pick_time'
    ];

    // appends function
    public function getPickDateAttribute(){
        $date = '';
        if($this->pickup_date){
            $date = date('m/d/Y', strtotime($this->pickup_date));
        }
        return $date;
    }

    public function getPickTimeAttribute(){
        $time = '';
        if($this->pickup_time){
            $time = date('h:i a', strtotime(date('Y-m-d '.$this->pickup_time)));
        }
        return $time;
    }

    public function getTimeAttribute(){
        $time = '';
        if($this->delivery_time){
            $time = date('h:i a', strtotime(date('Y-m-d '.$this->delivery_time)));
        }
        return $time;
    }

    public function getDateAttribute(){
        $date = '';
        if($this->delivery_date){
            $date = date('m/d/Y', strtotime($this->delivery_date));
        }
        return $date;
    }

    // Status Class
    public function statusClass()
    {
        $statuses = [
            'pending'   => 'question-img',
            'inprocess'   => 'question-img',
            'accepted'   => 'question-img',
            'delivered'  => 'correct-img',
            'cancelled' => 'cross-img',
        ];

        return $statuses[$this->status];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'stores_id', 'id');
    }

    public function assignDriver()
    {
        return $this->hasOne(DeliveryAssignedDriver::class, 'delivery_id', 'id');
    }
}    
