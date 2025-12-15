<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>

<body>

    <h2>Register</h2>
    <div class="container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" required><br><br>
            @if ($errors->has('name'))
                <span style="color:red">{{ $errors->first('name') }}</span><br>
            @endif
            <input type="email" name="email" placeholder="Email" required><br><br>
            @if ($errors->has('email'))
                <span style="color:red">{{ $errors->first('email') }}</span><br>
            @endif
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit">Sign Up</button>
            @if ($errors->has('password'))
                <span style="color:red">{{ $errors->first('password') }}</span><br>
            @endif
        </form>
    </div>


</body>

</html> -->


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">

</head>
<body>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="register-container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>

        {{-- sucess --}}
        @if (session('success'))
            <div style="color: green; margin-bottom: 15px;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errors --}}
        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="name" class="label">Name</label>
        <input type="text" placeholder="Enter Name" name="name" id="name" class="input" required value="{{ old('name') }}">

        <label for="email" class="label">Email</label>
        <input type="text" placeholder="Enter Email" name="email" id="email" class="input" required value="{{ old('email') }}">

        <label for="password" class="label">Password</label>
        <input type="password" name="password" placeholder="Password" class="input" required>

        <label for="password_confirmation" class="label">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="input" required>

        <button type="submit" class="btn-register">Sign Up</button>
    </div>

    <div class="signin-link">
        <p>Already have an account? <a href="/login">Login</a></p>
    </div>
</form>

</body>
</html>
