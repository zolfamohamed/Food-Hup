<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
</head>
<body>

<h2 class="cart-title">Your Cart</h2>

@if($cart->isEmpty())
    <p class="empty-cart">Your cart is empty</p>
@else

@php $total = 0; @endphp

<div class="cart-container">

@foreach($cart as $item)
    @php
       $itemTotal = $item->meal->price * $item->quantity;
        $total += $itemTotal;
    @endphp

    <div class="cart-card">

        <img src="{{ asset('images/meals/' . $item->meal->image) }}">

        <div class="cart-info">
            <h3>{{ $item->meal->name }}</h3>
            <p>{{ $item->meal->price }} EGP</p>

            <div class="quantity">
                <form action="{{ route('cart.decrease', $item->id) }}" method="POST">
                    @csrf
                    <button>-</button>
                </form>

                <span>{{ $item->quantity }}</span>

                <form action="{{ route('cart.increase', $item->id) }}" method="POST">
                    @csrf
                    <button>+</button>
                </form>
            </div>

            <p class="item-total">Item Total: {{ $itemTotal }} EGP</p>
        </div>

        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
            @csrf
            <button class="remove-btn">X</button>
        </form>

    </div>
@endforeach

</div>

<div class="cart-summary">
    <h3>Total: {{ $total }} EGP</h3>
    <form action= "{{route('cart.checkout')}}" method="POST">
        @csrf
    <button type="submit" class="checkout-btn">Checkout</button>
    </form>
</div>

@endif

<a class="back-home" href="/"> Back to Home</a>

</body>
</html>
