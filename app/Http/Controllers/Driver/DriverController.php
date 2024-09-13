<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delivery;

class DriverController extends Controller
{
   // use LivewireAlert;

    public function dashboard()
    {
        return view('driver.delivery-board');
    }

    public function viewDelivery($id)
    {
        $delivery = Delivery::with('store')->find($id);
        // dd($delivery);
        return view('driver.view-delivery', compact('delivery'));
    }

      public function approvedDelivery()
    {
        return view('driver.approved-delivery');
    }

     public function deliverySummary($deliveryId)
    {
        return view('driver.delivery-summary', compact('deliveryId'));
    }
}
