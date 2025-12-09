<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>
<body>

    <header>
        <strong>Restaurant</strong>

        <div>
            @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Sign Up</a>
            @else
                <span>Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button title="Logout">🔓</button>
                </form>
            @endguest
        </div>
    </header>

    <h2 class="welcome">Our Menu</h2>

    <div class="meals-container">
        @foreach ($meals as $meal)
            <div class="meal-card">
                <img src="{{ asset('images/meals/' . $meal->image) }}" alt="{{ $meal->name }}">
                <h4>{{ $meal->name }}</h4>
                <p>{{ number_format($meal->price, 2) }} EGP</p>

                <a class="btn-view" href="/meal/{{ $meal->id }}">View</a>

                <form action="/cart/add/{{ $meal->id }}" method="POST">
                    @csrf
                    <button class="btn-cart">Add to Cart</button>
                </form>
            </div>
        @endforeach
    </div>

</body>
</html>
