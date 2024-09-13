@extends('layouts.app')
@section('content')
<div class="container p-5">
    <p class="select-type-text">Select Your Account Type</p>
    <div class="row customer-driver-area mt-5 ">
        <div class="col-md-5 p-0  customer-section ">
            <img src="img/happy-manager-having-pleasant-conversation-with-client-phone-printing-shop_232070-18317.png"
                alt="" class="img-fluid">
            <p class="customer-text">Customer</p>
            <a href="{{ route('signup-customer') }}" class="link-overlay"></a>
        </div>
        <div class="col-md-5 p-0 customer-section ">
            <img src="img/high-angle-professional-female-driver-truck_23-2150263078.png" alt=""
                class="img-fluid">
            <p class="customer-text">Driver</p>
            <a href="{{ route('signup-driver') }}" class="link-overlay"></a>
        </div>
    </div>
</div>
@endsection
