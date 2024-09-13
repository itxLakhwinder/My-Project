<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract {

    public function toResponse($request) {

        if(auth()->user()->role == 'customer'){
            // dd(auth()->user()->role);

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
