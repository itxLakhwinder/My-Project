    <p class="delivery-text">Receipt Fields</p>
    <div class="row driver-form  ps-sm-5">
        <label for="exampleFormControlInput1" class="form-label">Name of store </label>
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-md-11 pe-4">
                <input type="text" class="form-control" id="exampleFormControlInput1" wire:model="store_name"
                    placeholder="The Home Depot">
                    <span class="text-danger"> @error('store_name'){{ $message }} @enderror </span>
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
            <span class="text-danger"> @error('store_address'){{ $message }} @enderror </span>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Pickup Date </label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023"
                wire:model="pickup_date">
                <span class="text-danger"> @error('pickup_date'){{ $message }} @enderror </span>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Pickup Time</label>
            <input type="time" class="form-control" id="exampleFormControlInput1" placeholder="05/03/2023"
                wire:model="pickup_time">
                <span class="text-danger"> @error('pickup_time'){{ $message }} @enderror </span>
        </div>

        {{-- <div class="col-md-6">
            <button type="submit" wire:click="firstStepSubmit()" class="apply-btn">Continue</button>

            <!-- <input type="submit" value="Continue" class="apply-btn"> -->
        </div> --}}
    </div>
