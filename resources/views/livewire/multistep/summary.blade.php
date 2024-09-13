<p class="delivery-text">Delivery Summary</p>
<div class="row driver-form   ps-sm-5">
    <label for="exampleFormControlInput1" class="form-label">Name of store </label>
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-md-11 pe-4">
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="The Home Depot"
                wire:model="store_name">
        </div>
        <div class="col-md-1 text-end">
            <img src="/img/home-depot-logo.png" alt="Name of store" class="home-depot-img">
        </div>
    </div>

    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Store Location Address
        </label>
        <input type="text" class="form-control" id="exampleFormControlInput1"
            placeholder="1856 North Main Street Austin, Texas 75897" wire:model="store_address">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Pickup Date </label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023"
            wire:model="pickup_date">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Pickup Time</label>
        <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023"
            wire:model="pickup_time">
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Pickup Needs</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Truck & Trailer"
            wire:model="pickup_time">
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Delivery Location
            Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"
            placeholder="1856 North Main Street Austin, Texas 75897" wire:model="delivery_address">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Delivery Date </label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023 "
            wire:model="delivery_date">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Delivery Time</label>
        <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023"
            wire:model="delivery_time">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Customer Name </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Charles Perry"
            wire:model="customer_name">
    </div>
    <div class="col-md-6">
        <label for="exampleFormControlInput1" class="form-label">Customer Phone Number</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="555.555.5555"
            wire:model="phone_number">
    </div>
    <div class="col-md-12">
        <label for="exampleFormControlInput1" class="form-label">Additional
            Notes</label>
        <textarea wire:model="additinal_note"
            placeholder="We are in the Emory Farms subdivision. Turn right when you enter the subdivision. Drive down to the dead end and you will see a red truck. I'll meet you there."></textarea>
    </div>
    {{-- <div>
        <button type="submit" wire:click="thirdStepSubmit()" class="apply-btn">Continue</button>
        <!-- <input type="submit" value="Continue" class="apply-btn"> -->
    </div> --}}

</div>
