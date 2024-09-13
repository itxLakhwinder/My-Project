<div>

    <div class="container p-5">

        <form wire:submit.prevent="store" enctype="multipart/form-data">
            <!-- fieldsets select store -->
            @if ($currentActiveStep == 1)
                @include('livewire.multistep.select-store')
            @endif

            <!-- fieldsets receipt-field -->
            @if ($currentActiveStep == 2)
                @include('livewire.multistep.upload-receipt')
            @endif

            <!-- fieldsets receipt-field -->
            @if ($currentActiveStep == 3)
                @include('livewire.multistep.view-receipt')
            @endif

            <!-- fieldsets receipt-field -->
            @if ($currentActiveStep == 4)
                @include('livewire.multistep.receipt-field')
            @endif

            <!-- fieldsets schedule-delivery -->
            @if ($currentActiveStep == 5)
                @include('livewire.multistep.schedule-delivery')
            @endif

            <!-- fieldsets schedule summary -->
            @if ($currentActiveStep == 6)
                @include('livewire.multistep.summary')
            @endif

            <!-- fieldsets card details -->
            @if ($currentActiveStep == 7)
                @include('livewire.multistep.payment')
            @endif
            <div class="bottom-btns">

                @if ($currentActiveStep == 2 || $currentActiveStep == 3 || $currentActiveStep == 4 || $currentActiveStep == 5 || $currentActiveStep == 6)
                    <button type="button" wire:click="decreaseStep()" class="back-btn">Back</button>

                @endif

                @if ($currentActiveStep == 1 || $currentActiveStep == 2 || $currentActiveStep == 3 || $currentActiveStep == 4 || $currentActiveStep == 5 || $currentActiveStep == 6)
                    <button type="button" wire:click="increaseStep()" class="apply-btn">Continue</button>

                @endif


                @if ($currentActiveStep == 7)
                    <button type="submit" class="next action-button apply-btn">Save</button>
                @endif
            </div>
            {{-- <h1>{{ $currentActiveStep }}</h1> --}}

        </form>
    </div>
</div>
