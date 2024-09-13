@extends('layouts.app')
@section('content')

    @livewire('driver.delivery-summary', ['deliveryId' => $deliveryId])

@endsection