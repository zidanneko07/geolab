<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GEOLAB</title>
    <style>
        body {
            background: #d8d8d8;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: #fff;
            width: 430px;
            max-width: 95vw;
            border-radius: 0;
            box-shadow: none;
            padding: 38px 32px 24px 32px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }
        .header span {
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #222;
            font-size: 1rem;
        }
        .required {
            color: #d32f2f;
            margin-left: 2px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 18px 12px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 0;
            background: #fafafa;
            margin-bottom: 24px;
            box-sizing: border-box;
        }
        .row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
        }
        .row label {
            margin: 0 0 0 8px;
            font-size: 1rem;
            color: #222;
            font-weight: normal;
        }
        .row a {
            color: #2a36a6;
            text-decoration: none;
            font-size: 1rem;
        }
        .row a:hover {
            text-decoration: underline;
        }
        input[type="checkbox"] {
            width: 22px;
            height: 22px;
            margin: 0;
        }
        button[type="submit"] {
            width: 100%;
            background: #2a36a6;
            color: #fff;
            border: none;
            border-radius: 0;
            padding: 18px 0;
            font-size: 1.2rem;
            font-weight: normal;
            letter-spacing: 1px;
            cursor: pointer;
            margin-bottom: 18px;
        }
        .footer {
            text-align: center;
            color: #bbb;
            font-size: 0.97rem;
            margin-top: 18px;
        }
        @media (max-width: 600px) {
            .login-container {
                width: 98vw;
                padding: 18px 4vw 12px 4vw;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="header">
            <span>GEOLAB</span>
            <span>PSG</span>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email anda<span class="required">*</span></label>
            <input type="email" id="email" name="email" required autofocus>
            <label for="password">Password<span class="required">*</span></label>
            <input type="password" id="password" name="password" required autocomplete="off">
            <div class="row">
                <div style="display:flex;align-items:center;">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember</label>
                </div>
                <a href="#">Lupa Sandi</a>
            </div>
            <button type="submit">SUBMIT</button>
        </form>
        <div class="footer">
            2024 (C) Copyright Pusat Survei Geologi
        </div>
    </div>
</body>
</html> 