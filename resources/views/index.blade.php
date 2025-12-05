<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Our Menu</h2>

        <div class="row">
            @foreach($meals as $meal)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/meals/' . $meal->image) }}"
                             class="card-img-top"
                             style="height:170px; object-fit:cover;"
                             alt="{{ $meal->name }}">
                        <div class="card-body text-center">
                            <h6 class="card-title">{{ $meal->name }}</h6>
                            <p class="text-muted mb-1">{{ number_format($meal->price, 2) }} EGP</p>
                            <button class="btn btn-dark btn-sm">Order Now</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>
</html>
