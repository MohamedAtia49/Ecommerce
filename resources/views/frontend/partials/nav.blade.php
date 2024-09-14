<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.home') }}">Atia Store<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                </li>
                <li class=""><a class="nav-link" href="{{ route('frontend.products.index') }}">Shop</a></li>
                <li><a class="nav-link" href="{{ route('frontend.products.index') }}">Blog</a></li>
                <li><a class="nav-link" href="{{ route('frontend.contact-us') }}">Contact us</a></li>

                @auth('client')
                    <li><a class="nav-link" href="{{ route('frontend.my.orders') }}">My Orders</a></li>
                    <li><a class="nav-link bg-danger rounded-3 btn-outline-primary" href="{{ route('frontend.logout') }}">Logout</a></li>
                @endauth

            @guest('client')
                <li><a class="nav-link" href="{{ route('frontend.sign-up') }}">Register</a></li>
                <label for="" class="nav-link">|</label>
                <li><a class="nav-link" href="{{ route('frontend.login') }}">Login</a></li>
            @endguest

            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                @auth('client')
                    <li><a class="nav-link" href="{{ route('frontend.profile') }}"><img src="images/user.svg"></a></li>
                    <li>
                @endauth
                    <a class="nav-link" href="@if (session('cart')) {{ route('frontend.cart') }} @endif"><img src="images/cart.svg" >
                        @if (session()->has('cart'))
                        {{ count(session('cart')) }}
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
