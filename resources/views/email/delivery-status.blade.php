<h1>Delivery Status</h1>

<h3>Hello {{ $delivery->user->name }}</h3>

@if ($action == 'begin_route')
    <p>Your order is on the way.</p>
@elseif ($action == 'delivered')
    <p>Your order is delivered</p>
@elseif ($action == 'accept')
    <p>Your order is accepted</p>

    <p>Driver Name : {{ $delivery->assignDriver->user->name }}</p>
@else
    <p>Your order is Cancel</p>
@endif