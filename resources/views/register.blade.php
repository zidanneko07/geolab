<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GEOLAB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #d8d8d8;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-container {
            background: #fff;
            max-width: 430px;
            width: 100%;
            padding: 38px 32px 24px 32px;
            border-radius: 4px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            border: none;
        }
        .form-control {
            border: 1px solid #d3d3d3;
            border-radius: 0;
            padding: 16px 12px;
            font-size: 16px;
            background: #fafafa;
        }
        .form-control:focus {
            border-color: #3d3dbb;
            box-shadow: none;
        }
        .btn-primary {
            background-color: #353dbb;
            border-color: #353dbb;
            padding: 14px 0;
            font-size: 18px;
            font-weight: 400;
            border-radius: 0;
            text-transform: none;
            letter-spacing: 0.5px;
        }
        .btn-primary:hover {
            background-color: #23288c;
            border-color: #23288c;
        }
        .text-danger {
            color: #dc3545 !important;
        }
        .form-label {
            font-weight: 400;
            color: #222;
            margin-bottom: 6px;
        }
        .form-check-label {
            font-size: 15px;
            color: #222;
        }
        .form-check-input {
            border-radius: 0;
        }
        .alert {
            border-radius: 0;
            font-size: 15px;
        }
        .invalid-feedback {
            font-size: 13px;
        }
        .small {
            font-size: 13px;
            color: #bbb;
        }
        .login-link {
            display: block;
            text-align: center;
            margin-top: 18px;
            font-size: 15px;
        }
        .login-link a {
            color: #353dbb;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .register-container {
                margin: 20px;
                padding: 24px 10px 16px 10px;
                max-width: 100vw;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="h3 mb-0 fw-bold">GEOLAB</div>
            <div class="h3 mb-0 fw-bold">PSG</div>
        </div>
        @if(session('error'))
            <div class="alert alert-danger py-2 mb-3">
                {{ session('error') }}
            </div>
        @endif
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password<span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <div class="form-check mb-4">
                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                <label class="form-check-label" for="terms">Setuju dengan <a href="#">Syarat & Ketentuan</a></label>
            </div>
            <button type="submit" class="btn btn-primary w-100">REGISTER</button>
        </form>
        <div class="login-link">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </div>
        <div class="text-center small mt-4">
            2024 (C) Copyright Pusat Survei Geologi
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 