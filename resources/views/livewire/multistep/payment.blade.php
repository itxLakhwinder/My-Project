<p class="delivery-text">Complete Delivery</p>
<div class="row driver-form  ps-sm-5">
    <div class="col-md-12 complete-delivery-section my-3">
        <div class="complete-delivery-tabs active">
            <a href="#"><span><img src="{{ asset('img/Group-1.png') }}"></span>Credit Card</a>
        </div>
        <div class="complete-delivery-tabs">
            <a href="#"><span><img src="{{ asset('img/paypal-svgrepo-com 1.png') }}"></span>Credit Card</a>
        </div>
        <div class="complete-delivery-tabs">
            <a href="#"><span><img src="{{ asset('img/venmo-svgrepo-com 1.png') }}"></span>Credit Card</a>
        </div>
        <div class="complete-delivery-tabs">
            <a href="#"><span><img src="{{ asset('img/square-cash-svgrepo-com 1.png') }}"></span>Credit Card</a>
        </div>
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Name on Card</label>
        <input type="text" wire:model="card_name" class="form-control" id="exampleFormControlInput1">
        <span class="text-danger"> @error('card_name'){{ $message }} @enderror </span>
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Card Number</label>
        <input type="text" wire:model="card_number" class="form-control" id="exampleFormControlInput1">
        <span class="text-danger"> @error('card_number'){{ $message }} @enderror </span>

    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Exp Month</label>
        <input type="text" wire:model="exp_month" class="form-control" id="exampleFormControlInput1">
        <span class="text-danger"> @error('exp_month'){{ $message }} @enderror </span>

    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Exp Year</label>
        <input type="text" wire:model="exp_year" class="form-control" id="exampleFormControlInput1">
        <span class="text-danger"> @error('exp_year'){{ $message }} @enderror </span>

    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">CVV</label>
        <input type="text" wire:model="cvv" class="form-control" id="exampleFormControlInput1">
        <span class="text-danger"> @error('cvv'){{ $message }} @enderror </span>
    </div>
    {{-- <div class="col-md-6 ">
        <input type="submit" value="Confirm Delivery" class="apply-btn">
    </div> --}}
</div>
