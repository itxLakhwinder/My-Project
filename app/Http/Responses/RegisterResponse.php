<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract {

    public function toResponse($request) {

        if(auth()->user()->role == 'customer'){
            return redirect()->route('customer.dashboard');
        }

        if(auth()->user()->role == 'driver'){
            return redirect()->route('driver.dashboard');
        }

        if(auth()->user()->role == 'admin'){
            return redirect()->route('admin.dashboard');
        }

		return redirect()->route('customer.index');
    }
}