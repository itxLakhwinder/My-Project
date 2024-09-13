<div>
    <div class="row d-flex justify-content-between">
        <div class="col-md-6">
            <p class="delivery-text">Approved Deliveries</p>
        </div>
        <div class="col-md-1 p-sm-0 p-3"> <img src="{{ asset('img/search.png') }}" alt=""></div>
    </div>

    @if (count($deliveries) > 0)

        @foreach ($deliveries as $assignedDelivery)
            <div class="approved-deliveries mt-3">
                <div class="approved-parts px-xl-5 px-2 py-4">
                    <h5>{{ $assignedDelivery->delivery->store->title }}</h5>
                </div>
                <div class="approved-parts">
                    <p class="delivery-address">DELIVERY ADDRESS</p>
                    <p class="delivery-address-text">{{ $assignedDelivery->delivery->delivery_address }}</p>
                </div>
                <div class="approved-parts">
                    <p class="delivery-address">DELIVERY DATE & TIME</p>
                    <p class="delivery-date">{{ $assignedDelivery->delivery->date }}<br>
                        {{ $assignedDelivery->delivery->time }} Delivery</p>
                </div>
                <div class="{{ $assignedDelivery->delivery->statusClass()}}">
                    <img src="{{ asset('img/'. $assignedDelivery->delivery->statusClass(). '.png') }}" alt="">
                    <a href="{{ route('driver.delivery-summary', $assignedDelivery->delivery->id ) }}"><img src="{{ asset('img/view.png') }}" alt=""></a>
                </div>
            </div>
        @endforeach
    @else
        <p> Delivery Not Found</p>
    @endif

</div>
