

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
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">


</head>

<body>

    <div class="cont">
        <nav class="navbar">
            <div class="navbar-container">
                <h3 class="logo">NEXUS</h3>


                <div class="nav-links">
                    <a href="{{route("adminpage")}}">Menu</a>





                    @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @method('PUT')
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



<form action="{{ route('updateitem', $meal->id) }}" method="post" enctype="multipart/form-data" class="meal-form">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name" style>Meal Name</label>
        <input type="text" name="name" id="name" value="{{ $meal->name }}">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description">{{ $meal->description }}</textarea>
        @error('description')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" step="any" name="price" id="price" value="{{ $meal->price }}">
        @error('price')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Meal Image</label>
        <input type="file" id="image" name="image" accept="image/*">
        <img id="preview" src="{{ asset('storage/' . $meal->image) }}" alt="Image Preview" style="width:300px; height:auto; border-radius:10px; margin-left:auto; margin-right:auto; ">
        @error('image')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn-cart">Update</button>
</form>

</body>

</html>
<script>
const input = document.getElementById('image');
const preview = document.getElementById('preview');

input.addEventListener('change', () => {
    const file = input.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => preview.src = e.target.result;
        reader.readAsDataURL(file);
    }
});
</script>

