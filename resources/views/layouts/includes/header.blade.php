<div class="dropdown dropdown-menu-section">
    <a href="" class="dropdown-toggle user-btn" type="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img src="{{ asset('img/user.png') }}" alt="">
        @if (auth()->check())
            <p class="user-text">{{ auth()->user()->name }}</p>
        @endif
    </a>
    <ul class="dropdown-menu">
        @if (auth()->check())
            {{-- <li><a class="dropdown-item" href="#"><img src="img/-2.png">Profile</a></li> --}}
           {{-- @if (auth()->user()->role == 'driver')
                <li><a class="dropdown-item" href="{{ route('driver.approved_delivery') }}"><img src="{{ asset('img/-2.png') }}">Approved Delivery</a></li>
                <li><a class="dropdown-item" href="{{ route('driver.dashboard') }}"><img src="{{ asset('img/-2.png') }}">Delivery Job</a></li>
            @else
                <li><a class="dropdown-item" href="{{ route('customer.delivery_list') }}"><img src="{{ asset('img/-2.png') }}">Deliveries</a></li>
                <li><a class="dropdown-item" href="{{ route('customer.dashboard') }}"><img src="{{ asset('img/-2.png') }}">Add Delivery</a></li>
            @endif --}}

            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('img/power-off.png') }}">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>


        @else
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Sign Up</a></li>
        @endif

    </ul>
</div>