<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use App\Models\Delivery;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Mail\DeliveryStatus as DeliveryStatusMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Enums\DeliveryStatus;

class DeliverySummary extends Component
{
       use LivewireAlert;

    //..
    public $delivery;

    // receipt fields
    public $store_name, $store_address, $pickup_date, $pickup_time;

    // schedule delivery
    public $deliveryId, $delivery_date, $delivery_time, $delivery_address, $phone_number, $customer_name, $pickup_need, $additinal_note;


    public function deliveryAction($id, $action)
    {
        $delivery = Delivery::with('user')->find($id);

        if($action == 'begin_route'){
            $delivery->update(['status'=> DeliveryStatus::Inprocess]);
            $message = 'Delivery in process';
        }elseif($action == 'delivered'){
            $delivery->update(['status'=> DeliveryStatus::Delivered]);
            $message = 'Delivery completed';
        }else{
            $delivery->update(['status'=> DeliveryStatus::Cancelled]);
            $message = 'Delivery cancelled';
        }

        // email..
        if (isEmail()) {
            try {
                Mail::to($delivery->user->email)->send(new DeliveryStatusMail($delivery, $action));
            } catch (Exception $e) {
            }
        }

        $this->alert('success', $message);
        return redirect()->route('driver.approved_delivery');
    }

    public function render()
    {
        $this->delivery =Delivery::with('store')->findOrFail($this->deliveryId);

        return view('livewire.driver.delivery-summary');
    }
}
