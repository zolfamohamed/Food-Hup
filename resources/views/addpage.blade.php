

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Home</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/forms.css') }}">
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




<form action="{{ route('storeitem') }}" method="POST" enctype="multipart/form-data" class="meal-form">
    @csrf

    <div class="form-group">
        <input type="text" name="name" placeholder="name" value="{{ old('name') }}">
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <textarea name="description" placeholder="description">{{ old('description') }}</textarea>
        @error('description')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <input type="number" step="any" name="price" placeholder="price" value="{{ old('price') }}">
        @error('price')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group" style="display:flex; align-items:center; gap:10px;">
        <input type="file" id="image" name="image" accept="image/*">
        <span style="color:#D4AF37;">choose an image file</span>
        @error('image')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn-cart">Create</button>
</form>

</body>

</html>
<script>
    const imageInput = document.getElementById('image');
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                let preview = document.getElementById('preview');
                if(!preview) {
                    preview = document.createElement('img');
                    preview.id = 'preview';
                    preview.style.width = '120px';
                    preview.style.borderRadius = '10px';
                    imageInput.parentNode.appendChild(preview);
                }
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>


