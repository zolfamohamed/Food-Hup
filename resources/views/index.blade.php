<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">

</head>

<body>

    <div class="cont">
        <nav class="navbar">
            <div class="navbar-container">
                <h3 class="logo">NEXUS</h3>


                <div class="nav-links">
                    <a href="#menu">Menu</a>


                    <a href="{{ route('cart.show') }}">
                        <i class="fa-solid fa-basket-shopping" style="color: #C9A274; font-size: 24px;"></i>
                    </a>


                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                          <span style="color:#fff0dc; ">Welcome, {{ auth()->user()->name }}</span>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Sign Up</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
@if (session('success'))
    <div id="success-message" class="alert alert-success text-center">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.style.display = 'none';
            }
        }, 3000); // 3000ms = 3 seconds
    </script>
@endif




    <section class="hero">
        <div class="hero-overlay">
            <img src="{{ asset('images/hero/r2.jpg') }}" alt="">
        </div>
        <div class="hero-content">
            <h1>NEXUS</h1>
            <p>Fresh flavors · Elegant taste · Made with love</p>
        </div>
    </section>




    <div id="menu" class="meals-container">
        @foreach ($meals as $meal)
            <div class="meal-card">
                    <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">

                <h4>{{ $meal->name }}</h4>
                <p>{{ number_format($meal->price, 2) }} EGP</p>

                <h6>{{ $meal->description }}</h6>

                <form action="/cart/add/{{ $meal->id }}" method="POST">
                    @csrf
                    <button class="btn-cart">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

</body>

</html>
