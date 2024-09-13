@extends('layouts.app')
@section('content')
   @livewire('driver.view-delivery', ['delivery'=>$delivery])
@endsection
