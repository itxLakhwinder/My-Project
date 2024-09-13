<div>
    <p class="delivery-text">View Delivery</p>
    <div class="row driver-form  p-sm-5">
        <label for="exampleFormControlInput1" class="form-label">Name of store </label>
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-md-11 pe-4">
                <input type="text" class="form-control" name="store_name" value="{{ $delivery->store->title }}"
                    id="exampleFormControlInput1" placeholder="The Home Depot" readonly>
            </div>


           {{--
            @if (!empty($delivery->store->getMedia('logo')))
                <div class="col-md-1 text-end">
                    <img src="{{ $delivery->store->getFirstMediaUrl('logo') }}" alt="Name of store"
                        class="home-depot-img">
                </div>
            @endif
           --}}
        </div>

        <div class="col-md-12">
            <label for="exampleFormControlInput1" class="form-label">Store Location Address
            </label>
            <input type="text" name="store_address" value="{{ $delivery->store_address }}" class="form-control"
                id="exampleFormControlInput1" placeholder="1856 North Main Street Austin, Texas 75897" readonly>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Pickup Date </label>
            <input type="date" class="form-control" name="pickup_date" value="{{ $delivery->pickup_date }}"
                id="exampleFormControlInput1" placeholder="05/03/2023" readonly>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Pickup Time</label>
            <input type="text" class="form-control" name="pickup_time" value="{{ $delivery->pick_time }}"
                id="exampleFormControlInput1" placeholder="05/03/2023" readonly>
        </div>
        <div class="col-md-12">
            <label for="exampleFormControlInput1" class="form-label">Pickup Needs</label>
            <input type="text" class="form-control" name="pickup_need" value="{{ $delivery->pickup_need }}"
                id="exampleFormControlInput1" placeholder="Truck & Trailer" readonly>
        </div>
        <div class="col-md-12">
            <label for="exampleFormControlInput1" class="form-label">Delivery Location
                Address</label>
            <input type="text" class="form-control" name="delivery_address" value="{{ $delivery->delivery_address }}"
                id="exampleFormControlInput1" placeholder="1856 North Main Street Austin, Texas 75897" readonly>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Delivery Date </label>
            <input type="date" class="form-control" name="delivery_date" value="{{ $delivery->delivery_date }}"
                id="exampleFormControlInput1" placeholder="05/03/2023" readonly>
        </div>
        <div class="col-md-6">
            <label for="exampleFormControlInput1" class="form-label">Delivery Time</label>
            <input type="text" class="form-control" name="delivery_time" value="{{ $delivery->time }}"
                id="exampleFormControlInput1" placeholder="05/03/2023" readonly>
        </div>
        <div class="col-md-12">
            <label for="exampleFormControlInput1" class="form-label">Additional
                Notes</label>
            <textarea name="additinal_note"
                placeholder="We are in the Emory Farms subdivision. Turn right when you enter the subdivision. Drive down to the dead end and you will see a red truck. I'll meet you there."
                readonly>
                {{ $delivery->additinal_note }}
            </textarea>
        </div>
        <div class="col-md-6">
            <button class="apply-btn" wire:click="deliveryAssignedDriver('{{ $delivery->id }}', 'accept')">
                <i wire:loading wire:target="deliveryAssignedDriver('{{ $delivery->id }}', 'accept')" class="fa fa-spin fa-spinner"></i>   Apply
            </button>
            {{-- <a href="{{ route('driver.delivery_assigned_driver', $delivery->id) }}" class="apply-btn">Apply</a> --}}
        </div>
    </div>
</div>
