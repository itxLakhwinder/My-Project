    <p class="delivery-text pb-4">Select a Store</p>
    <div class="row ">

        @if (count($stores) > 0)
            @foreach ($stores as $store)
                <div class="col-md-6 store-checkbox">

                    <input class="form-check-input" type="radio" name="select-store" value="{{ $store->id }}" wire:model="store_id"
                        id="flexCheckDefault">
                    <div class="d-flex align-items-center store-section">

                        <div class="store-img">
                                <img src="/img/home-depot-logo.png" alt="">
                            {{-- 
                            @if (!empty($store->getMedia('logo')))
                                <img src="{{ $store->getFirstMediaUrl('logo') }}" alt="">
                            @endif
                            --}}    
                        </div>
                        <div class="store-text">
                            <p>{{ $store->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Store Not Found</p>
        @endif
    </div>
    <div class="row mt-4">
        <span class="text-danger"> @error('store_id') {{ $message }} @enderror </span>
    </div>
    {{--
    @if ($currentActiveStep == 1 || $currentActiveStep == 2 || $currentActiveStep == 3 || $currentActiveStep == 4)
        <button type="button" wire:click="increaseStep()" class="apply-btn">Continue</button>
    @endif --}}
