<div>
    <p class="delivery-text">Delivery Summary</p>
    <div class="row driver-form   ps-sm-5">
        <label for="exampleFormControlInput1" class="form-label">Name of store </label>
        <div class="d-flex justify-content-between align-items-center">
            <div class="col-md-11 pe-4">
                <input type="text" class="form-control" name="store_name" value="{{ $delivery->store->title }}" placeholder="The Home Depot" readonly>
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
            <label class="form-label">Store Location Address </label>
            <input type="text" class="form-control" name="store_address" value="{{ $delivery->store_address }}" placeholder="1856 North Main Street Austin, Texas 75897" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Pickup Date </label>
            <input type="date" class="form-control" value="{{ $delivery->pickup_date }}" placeholder="05/03/2023" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Pickup Time</label>
            <input type="text" class="form-control" placeholder="05/03/2023" value="{{ $delivery->pick_time }}" readonly>
        </div>
        <div class="col-md-12">
            <label class="form-label">Pickup Needs</label>
            <input type="text" class="form-control" placeholder="Truck & Trailer" value="{{ $delivery->pickup_need }}" readonly>
        </div>
        <div class="col-md-12">
            <label  class="form-label">Delivery Location Address</label>
            <input type="text" class="form-control" placeholder="1856 North Main Street Austin, Texas 75897" value="{{ $delivery->delivery_address }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Delivery Date </label>
            <input type="date" class="form-control" placeholder="05/03/2023 " value="{{ $delivery->delivery_date }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Delivery Time</label>
            <input type="text" class="form-control" placeholder="05/03/2023" value="{{ $delivery->time }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Customer Name </label>
            <input type="text" class="form-control" placeholder="Charles Perry" value="{{ $delivery->customer_name }}" readonly>
        </div>
        <div class="col-md-6">
            <label class="form-label">Customer Phone Number</label>
            <input type="number" class="form-control" placeholder="555.555.5555" value="{{ $delivery->phone_number }}" readonly>
        </div>
        <div class="col-md-12">
            <label  class="form-label">Additional Notes</label>
            <textarea placeholder="We are in the Emory Farms subdivision. Turn right when you enter the subdivision. Drive down to the dead end and you will see a red truck. I'll meet you there.">
                {{ $delivery->additinal_note }}
            </textarea>
        </div>
        <div>
            @if ($delivery->status == 'inprocess')
                <button class="apply-btn">Begin Route </button>
            @else
                <button wire:click.prevent="deliveryAction('{{ $delivery->id }}', 'begin_route')" class="apply-btn">
                    <i wire:loading wire:target="deliveryAction('{{ $delivery->id }}', 'begin_route')" class="fa fa-spin fa-spinner"></i> Begin Route
                </button>
            @endif

            @if ($delivery->status == 'delivered')
                <button  class="delivery-complete-btn"> Delivery Complete </button>
            @else
                <button wire:click.prevent="deliveryAction('{{ $delivery->id }}', 'delivered')" class="delivery-complete-btn">
                    <i wire:loading wire:target="deliveryAction('{{ $delivery->id }}', 'delivered')" class="fa fa-spin fa-spinner"></i> Delivery Complete
                </button>
            @endif

            @if ($delivery->status == 'cancelled')
                <button class="cancel-btn">Cancel</button>
            @else
                <button wire:click.prevent="deliveryAction('{{ $delivery->id }}', 'cancel')" class="cancel-btn">
                    <i wire:loading wire:target="deliveryAction('{{ $delivery->id }}', 'cancel')" class="fa fa-spin fa-spinner"></i> Cancel
                </button>
            @endif

        </div>

    </div>

</div>
</div>