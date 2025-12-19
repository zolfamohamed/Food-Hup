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
                <h3 class="logo">Luméra</h3>


                <div class="nav-links">
                    <a href="{{route("adminpage")}}">Menu</a>
                     <a href="{{ route('additem') }}">Add Item</a>





                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>

                    @endauth
                </div>
            </div>
        </nav>
    </div>
        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif






    <div id="menu" class="meals-container">
        @foreach ($meals as $meal)
            <div class="meal-card">
                    <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">

                <h4>{{ $meal->name }}</h4>
                <p>{{ number_format($meal->price, 2) }} EGP</p>

                <h6>{{ $meal->description }}</h6>

                <form action="{{ route('edititem', $meal->id) }}" method="GET">
                    @csrf
                    <button class="btn-edit" type="submit">Edit Item</button>
                </form>
                   <form action="{{ route('deleteitem', $meal->id) }}"  method="post">
                    @method('delete')
                    @csrf
                    <button class="btn-delete" type="submit">Delete Item</button>
                </form>
            </div>
        @endforeach
    </div>

</body>

</html>
