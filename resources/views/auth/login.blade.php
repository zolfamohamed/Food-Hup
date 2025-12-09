<!DOCTYPE html>
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

</html>
