<p class="delivery-text">Schedule Delivery</p>
<div class="row driver-form  ps-sm-5">
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Delivery Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" wire:model="delivery_date">
        <span class="text-danger"> @error('delivery_date'){{ $message }} @enderror </span>
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Delivery Time</label>
        <input type="time" class="form-control" id="exampleFormControlInput1" wire:model="delivery_time">
        <span class="text-danger"> @error('delivery_time'){{ $message }} @enderror </span>
    </div>

    <div class="col-md-12 ">
        <label for="exampleFormControlInput1" class="form-label">Delivery Location</label>
        <input type="text" class="form-control location-input" id="exampleFormControlInput1"
            wire:model="delivery_address">
            <span class="text-danger"> @error('delivery_address'){{ $message }} @enderror </span>
    </div>
    <div class="col-md-6 ">
        <label for="exampleFormControlInput1" class="form-label">Contact Phone Number</label>
        <input type="number" class="form-control contact-input" id="exampleFormControlInput1"
            wire:model="phone_number">
            <span class="text-danger"> @error('phone_number'){{ $message }} @enderror </span>

    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Contact Information</label>
        <input type="text" class="form-control contact-information" id="exampleFormControlInput1"
            wire:model="customer_name">
            <span class="text-danger"> @error('customer_name'){{ $message }} @enderror </span>

    </div>
    <div class="col-md-12 select-rating">
        <label for="exampleFormControlInput1" class="form-label">Pickup Needs</label>
        <select class="form-select pickup-need" aria-label="Default select example" wire:model="pickup_need">
            <option selected></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <span class="text-danger"> @error('pickup_need'){{ $message }} @enderror </span>
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Additional
            Notes</label>
        <textarea wire:model="additinal_note"></textarea>
        <span class="text-danger"> @error('additinal_note'){{ $message }} @enderror </span>
    </div>
    {{-- <div class="col-md-6 ">
        <button type="submit" wire:click="secondStepSubmit()" class="apply-btn">Continue</button>
        <!-- <input type="submit" value="Continue" class="apply-btn"> -->
    </div> --}}
</div>
