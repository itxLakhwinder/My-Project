<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use App\Models\DeliveryAssignedDriver;

class ApprovedDelivery extends Component
{
    public function render()
    {   
        $deliveries = DeliveryAssignedDriver::with('delivery')->where('driver_id', auth()->user()->id)->latest()->get();
        return view('livewire.driver.approved-delivery', compact('deliveries'));
    }
}
