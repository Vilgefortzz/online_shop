<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="brandFont">{{ config('app.name') }}</div>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse" style="text-align: center">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">

            </ul>

            <!-- Center Side Of Navbar - used to display flash messages -->
            <ul class="nav nav-center">

                @if(Session::has('changed_name'))
                    <div class="alert alert-success text-center">{{ Session::get('changed_name') }}</div>
                @endif

                @if(Session::has('changed_password'))
                    <div class="alert alert-success text-center">{{ Session::get('changed_password') }}</div>
                @endif

                    @if(Session::has('changed_email'))
                        <div class="alert alert-success text-center">{{ Session::get('changed_email') }}</div>
                    @endif

                    @if(Session::has('removed_account'))
                        <div class="alert alert-danger text-center">{{ Session::get('removed_account') }}</div>
                    @endif

                    {{--AJAX flash messages--}}
                    <div id="added_to_cart" class="alert alert-success text-center" hidden>You have added new product to cart</div>
                    <div id="removed_from_cart" class="alert alert-danger text-center" hidden>You have removed product from cart</div>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Cart -->
                <li class="dropdown">
                    <a id="shopping_cart" href="{{ url('/cart') }}">
                        <span class="glyphicon glyphicon-shopping-cart"></span>Shopping cart
                        {{--Number of products--}}
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '0' }}</span>
                    </a>

                    @if(Session::has('cart'))
                        <ul id="cart_list" class="dropdown-menu" role="menu">
                            @if(Session::get('cart')->totalQuantity == 0)
                                <li>
                                    <h5 class="text-center">Cart is empty</h5>
                                </li>
                            @else
                                @foreach(Session::get('cart')->products as $product)
                                    <li>
                                        <a href="#">
                                            <span class="glyphicon glyphicon-hand-right"></span>{{$product['product']['name']}}
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    @else

                            <ul id="cart_list" class="dropdown-menu" role="menu">
                                <li>
                                    <h5 class="text-center">Cart is empty</h5>
                                </li>
                            </ul>
                    @endif
                </li>

                @if (Auth::guest())

                    <!-- Without Authentication Links -->
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                <!-- Authentication Links -->
                    <li class="dropdown">
                        <a href="#">
                            <span class="glyphicon glyphicon-user"></span>{{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('users/'.Auth::user()->id.'/settings') }}">
                                    <span class="glyphicon glyphicon-cog"></span>Settings
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="glyphicon glyphicon-modal-window"></span>Your orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <span class="glyphicon glyphicon-log-out"></span>Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>