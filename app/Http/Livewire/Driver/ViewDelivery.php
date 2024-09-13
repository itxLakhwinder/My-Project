<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;
use App\Models\Delivery;
use App\Models\DeliveryAssignedDriver;
use App\Enums\DeliveryStatus;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Mail\DeliveryStatus as DeliveryStatusMail;
use Exception;
use Illuminate\Support\Facades\Mail;

class ViewDelivery extends Component
{

    use LivewireAlert;

    //..
    public $delivery;

    //schedule delivery
    public $deliveryId, $action;
    protected $listeners = ['confirmedAction'];

    public function deliveryAssignedDriver($delivery_id, $action)
    {
        $this->deliveryId = $delivery_id;
        $this->action = $action;
        $this->alert('warning', 'Are you sure', [
            'text' => "Delivery assigned to you.",
            'toast' => false,
            'position' => 'center',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'onConfirmed' => 'confirmedAction',
            'onDismissed' => 'cancelled',
            'allowOutsideClick' => false,
            'timer' => null,
        ]);
    }

        public function confirmedAction()
    {
        $delivery = Delivery::findOrFail($this->deliveryId);
        if ($delivery) {
            $store = new DeliveryAssignedDriver;
            $store->driver_id = auth()->user()->id;
            $store->delivery_id = $delivery->id;
            $store->save();

            $delivery->update(['status' => DeliveryStatus::Accepted]);

            // email..
            if (isEmail()) {
                try {
                    Mail::to($delivery->user->email)->send(new DeliveryStatusMail($delivery, $this->action));
                } catch (Exception $e) {
                }
            }

            $this->flash('success', 'Delivery Assigned');
            return redirect()->route('driver.approved_delivery');
        } else {
            $this->flash('success', 'Delivery not found');
            return back();
        }
    }

    public function render()
    {
        return view('livewire.driver.view-delivery');
    }
}
