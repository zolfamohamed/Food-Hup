<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
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

</html>
