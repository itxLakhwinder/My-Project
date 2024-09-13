<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use App\Models\Delivery;

class DeliveryBoard extends Component
{
    public function render()
    {
           $deliveries = Delivery::with('store')->where(function($query){
            $query->where('status', 'pending');
            $query->orWhere('status', 'cancelled');
        })->latest()->get();

        return view('livewire.driver.delivery-board', compact('deliveries'));
    }
}
