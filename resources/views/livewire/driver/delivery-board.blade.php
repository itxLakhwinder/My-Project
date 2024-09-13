<div>

    <div class="row d-flex justify-content-between">
        <div class="col-md-6">
            <p class="delivery-text">Delivery Board</p>
        </div>
        <div class="col-md-1"> <img src="img/search.png" alt=""></div>
    </div>

    @if (count($deliveries) > 0)
        @foreach ($deliveries as $delivery)
            <div class="approved-deliveries mt-3">
                <div class="approved-parts px-5 py-4">
                    <h5>{{ $delivery->store->title }}</h5>
                </div>
                <div class="approved-parts">
                    <p class="delivery-address">DELIVERY ADDRESS</p>
                    <p class="delivery-address-text">{{ $delivery->delivery_address }}</p>
                </div>
                <div class="approved-parts">
                    <p class="delivery-address">DELIVERY DATE & TIME</p>
                    <p class="delivery-date">{{ $delivery->date }}<br>
                        {{ $delivery->time }} Delivery</p>
                </div>
                <div class="question-img">
                    <a href="{{ route('driver.view_delivery',$delivery->id) }}"><img src="{{ asset('img/view.png')}}" alt=""></a>

                </div>
            </div>
        @endforeach
    @else
        <p>Delivery Not Found</p>
    @endif

</div>
