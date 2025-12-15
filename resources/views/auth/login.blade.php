<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>

    <h2>Login</h2>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required><br><br>
            @if ($errors->has('email'))
                <span style="color:red">{{ $errors->first('email') }}</span><br>
            @endif
            <input type="password" name="password" placeholder="Password" required><br><br>
            @if ($errors->has('password'))
                <span style="color:red">{{ $errors->first('password') }}</span><br>
            @endif

            <button type="submit">Login</button>
        </form>

    </div>

</body>

</html> -->

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">

</head>
<body>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-container">
            <h1>Login</h1>
            @if ($errors->any())
                <div style="color: red; margin-bottom: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <label for="email" class="label">Email</label>
            <input type="text" placeholder="Enter Email" name="email" id="email" class="input" required value="{{ old('email') }}">

            <label for="password" class="label">Password</label>
            <input type="password" name="password" placeholder="Password" class="input" required>

            <button type="submit" class="login-btn">Login</button>

            <div class="signup-link">
                <p>Don't have an account? <a href="/register">Sign up</a></p>
            </div>
        </div>
    </form>

</body>
</html>