
<meta charset="UTF-8">
<title>Title</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <img src="{{ asset ('img/logo.png') }}" class="pr-5" alt="logo" height="50px"
            align="left"/>
            <a class="navbar-brand js-scroll-trigger" href="/home" style="color: #000000">Welcome to siBengkel </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/mitra" style="color: #000000">Mitra</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href='/produk' style="color: #000000">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href='/bookingservice' style="color: #000000">Booking Service</a>
                </li>

                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #000000">Hi, {{Auth::user()->name}}</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/logout" style="color: #000000"> Logout </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/viewcart">
                        <div class="header-wrapicon2">
                            <img src="{{ asset ('img/cart.png') }}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                            @if($notif->isEmpty())
                            @else
                            <span class="header-icons-noti" id="notification">!</span>
                            @endif
                        </div>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="/profile" class="nav-link js-scroll-trigger">
                        <img src= "{{ asset ('img/icon-header-01.png') }}" class="header-icon1" alt="ICON">
                    </a>
                </li>
                @else

                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="/login" style="color: #000000">Login</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>

</nav>
