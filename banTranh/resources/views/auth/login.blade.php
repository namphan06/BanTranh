<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <style type="text/css">
    body {
        background: #F8F9FA;
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        padding: 15px;
        overflow: hidden;
    }

    .wrapper {
        max-width: 500px;
        width: 100%;
        background: #fff;
        border-radius: 5px;
        box-shadow: 0px 4px 10px 1px rgba(0, 0, 0, 0.1);
    }

    .wrapper .title {
        height: 120px;
        background: #16a085;
        border-radius: 5px 5px 0 0;
        color: #fff;
        font-size: 30px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wrapper form {
        padding: 25px 35px;
    }

    .wrapper form .row {
        height: 60px;
        margin-top: 15px;
        position: relative;
    }

    .wrapper form .row input {
        height: 100%;
        width: 100%;
        outline: none;
        padding-left: 70px;
        border-radius: 5px;
        border: 1px solid lightgrey;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    form .row input:focus {
        border-color: #16a085;
    }

    form .row input::placeholder {
        color: #999;
    }

    .wrapper form .row i {
        position: absolute;
        width: 55px;
        height: 100%;
        color: #fff;
        font-size: 22px;
        background: #16a085;
        border: 1px solid #16a085;
        border-radius: 5px 0 0 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .wrapper form .pass {
        margin-top: 12px;
    }

    .wrapper form .pass a {
        color: #16a085;
        font-size: 17px;
        text-decoration: none;
    }

    .wrapper form .pass a:hover {
        text-decoration: underline;
    }

    .wrapper form .button input {
        margin-top: 20px;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        padding-left: 0px;
        background: #16a085;
        border: 1px solid #16a085;
        cursor: pointer;
    }

    form .button input:hover {
        background: #12876f;
    }

    .wrapper form .signup-link {
        text-align: center;
        margin-top: 45px;
        font-size: 17px;
    }

    .wrapper form .signup-link a {
        color: #16a085;
        text-decoration: none;
    }

    form .signup-link a:hover {
        text-decoration: underline;
    }

    .wrapper form .button input {
        margin-top: 20px;
        color: #fff;
        font-size: 20px;
        font-weight: 500;
        padding: 15px 0;
        background: #16a085;
        border: none;
        border-radius: 5px;
        width: 100%;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s ease;
    }

    form .button input:hover {
        background: #12876f;
        transform: translateY(-2px);
    }

    form .button input:active {
        background: #0f6a53;
        transform: translateY(2px);
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif

            <div class="row">
                <i class="fas fa-user"></i>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="Email or Phone" required>
            </div>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password" required>
            </div>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="rememberMe" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Keep me logged in</label>
                </div>
                <a href="#" class="pass">Forgot password?</a>
            </div>

            <div class="button">
                <input type="submit" value="Login" />
            </div>

            <div class="signup-link">
                Don't have an account? <a href="{{ route('register') }}">Sign up now</a>
            </div>
        </form>
    </div>
</body>

</html>