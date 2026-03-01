<!DOCTYPE html>
<html>

<head>
    <title>Login Pegawai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }

        .left-section {
            background: var(--bs-primary);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 40px;
            text-align: center;
        }

        .left-section h1 {
            font-size: 40px;
            font-weight: bold;
        }

        .login-wrapper {
            height: 100vh;
            display: flex;
        }

        .login-card {
            width: 100%;
            max-width: 380px;
            margin: auto;
        }

        .form-control {
            height: 48px;
        }

        .btn-primary {
            height: 48px;
            font-size: 17px;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- LEFT -->
        <div class="col-lg-6 col-md-6 d-none d-md-flex left-section">
            <h1>Aplikasi Pegawai</h1>
            <p class="mt-3">Sistem Informasi Data Pegawai</p>
        </div>

        <!-- RIGHT -->
        <div class="col-lg-6 col-md-6 col-sm-12 d-flex">

            <div class="login-card">

                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">Login</h3>
                    <p class="text-muted">Silakan masuk ke akun Anda</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger text-center">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="Masukkan email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required
                            placeholder="Masukkan password">
                    </div>

                    <button class="btn btn-primary w-100 mt-2">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
