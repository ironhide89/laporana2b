<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bukarivaso - Login</title>
    <meta name="description" content="Login ke akun Bukarivaso Anda.">

    <meta name="theme-color" content="#4e73df"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --app-primary: #4e73df;
            --app-primary-darker: #2e59d9;
            --app-secondary: #858796;
            --app-light: #f8f9fc;
            --app-lighter-grey: #eaecf4;
            --app-dark: #5a5c69;
            --app-text-dark: #343a40;
            --app-text-muted: #858796;
            --app-card-bg: #ffffff;
            --app-border-radius: 0.75rem;
            --app-card-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
            --app-font-family: 'Poppins', sans-serif;
        }

        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        body.login-page {
            background: linear-gradient(135deg, var(--app-primary) 0%, var(--app-primary-darker) 100%);
            font-family: var(--app-font-family);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .login-box {
            width: 90%;
            max-width: 400px; /* Limit max width */
        }

        .login-card {
            background-color: var(--app-card-bg);
            border-radius: var(--app-border-radius);
            box-shadow: var(--app-card-shadow);
            border: none;
            overflow: hidden; /* Ensure content respects radius */
        }

        .login-card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 2rem 1.5rem 1rem 1.5rem; /* More top padding */
            text-align: center;
        }
        .login-card-header .login-logo img {
            max-width: 150px; /* Adjust logo size */
            height: auto;
            margin-bottom: 0.5rem;
        }
        .login-card-header .login-box-msg {
            color: var(--app-text-muted);
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .login-card-body {
            padding: 1.5rem 2rem 2rem 2rem; /* Adjust padding */
        }

        .input-group .form-control {
            border-radius: var(--app-border-radius) !important; /* Apply radius */
            border: 1px solid var(--app-lighter-grey);
            padding: 0.7rem 1rem; /* Adjust padding */
            font-size: 0.95rem;
            height: auto; /* Override fixed height if any */
            border-right: none; /* Remove border next to icon */
        }
        .input-group .form-control:focus {
            border-color: var(--app-primary);
            box-shadow: 0 0 0 0.2rem rgba(var(--app-primary-rgb, 78, 115, 223), 0.25);
            z-index: 3; /* Ensure focus outline is on top */
        }
        .input-group .input-group-text {
            background-color: var(--app-card-bg);
            border: 1px solid var(--app-lighter-grey);
            border-left: none; /* Remove border next to input */
            border-radius: 0 var(--app-border-radius) var(--app-border-radius) 0 !important;
            color: var(--app-secondary);
            padding: 0.7rem 0.9rem;
        }
        .input-group .form-control:focus + .input-group-append .input-group-text {
             border-color: var(--app-primary); /* Match focus border */
        }

        .btn-login-custom {
            background-color: var(--app-primary);
            border-color: var(--app-primary);
            color: white;
            font-weight: 500;
            padding: 0.7rem 1rem;
            border-radius: 50px; /* Pill shape */
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .btn-login-custom:hover {
            background-color: var(--app-primary-darker);
            border-color: var(--app-primary-darker);
            transform: translateY(-2px);
        }
        .btn-back-custom {
            background-color: var(--app-secondary);
            border-color: var(--app-secondary);
            color: white;
            font-weight: 500;
            padding: 0.7rem 1rem;
            border-radius: 50px;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .btn-back-custom:hover {
             background-color: var(--app-dark);
             border-color: var(--app-dark);
             transform: translateY(-2px);
        }

        /* SweetAlert Styling (Optional, if needed) */
        .swal2-popup {
            font-family: var(--app-font-family) !important;
        }
        .swal2-title {
             color: var(--app-text-dark) !important;
        }
        .swal2-html-container {
             color: var(--app-dark) !important;
        }

        /* Remove mobile bottom nav on login page */
        .navbar-mobile { display: none !important; }
        /* Adjust body padding if mobile nav was applying it */
         @media (max-width: 767.98px) {
            body {
                padding-top: 0; /* No top padding */
                padding-bottom: 0; /* No bottom padding */
                 align-items: flex-start; /* Align card top on small screens */
                 padding-top: 3rem; /* Add some top space */
            }
            .login-box { width: 95%; }
            .login-card-body { padding: 1.5rem; }
        }

    </style>
</head>
<body class="login-page">
<div class="login-box">
    <div class="card login-card">
        <div class="card-header login-card-header">
            <a href="{{ route('index') }}" class="login-logo">
                <img src="{{ asset('logo/air.png') }}" alt="Bukarivaso Logo">
            </a>
            <p class="login-box-msg">Silakan login untuk melanjutkan</p>
        </div>
        <div class="card-body login-card-body">

            <form action="{{ route('login-proses') }}" method="post" class="needs-validation" novalidate> 
                @csrf
                {{-- Email Input --}}
                <div class="mb-3"> 
                    <label for="email" class="form-label visually-hidden">Username</label>
                    <div class="input-group">
                        <input type="name" name="email" id="name" class="form-control" placeholder="Username" required autofocus value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                         <div class="invalid-feedback">
                            Mohon masukkan Username yang valid.
                        </div>
                    </div>
                </div>

                {{-- Password Input --}}
                <div class="mb-4"> 
                    <label for="password" class="form-label visually-hidden">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Mohon masukkan password Anda.
                        </div>
                    </div>
                     {{-- Optional: Remember Me Checkbox --}}
                    {{-- <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember" style="font-size: 0.9rem; color: var(--app-text-muted);">
                            Ingat Saya
                        </label>
                    </div> --}}
                </div>

                {{-- Action Buttons --}}
                <div class="row g-2">
                    <div class="col-6">
                        <a href="{{ route('index') }}" class="btn btn-back-custom btn-block w-100">Kembali</a>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-login-custom btn-block w-100">Sign In</button>
                    </div>
                </div>
            </form>

            {{-- Optional: Forgot Password / Register Links --}}
            {{-- <p class="mt-3 mb-1 text-center">
                <a href="#" style="font-size: 0.9rem;">Lupa Password?</a>
            </p>
            <p class="mb-0 text-center">
                <a href="#" class="text-center" style="font-size: 0.9rem;">Daftar Akun Baru</a>
            </p> --}}

        </div>
        </div>
    </div>
{{-- Remove Mobile Bottom Nav from Login Page --}}
{{-- <div class="d-block d-md-none fixed-bottom ..."> ... </div> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('/sw.js') }}"></script>
<script> if ("serviceWorker" in navigator) { /* ... registration code ... */ } else { console.error("Service workers are not supported."); } </script>

{{-- SweetAlert Messages --}}
@if ($message = Session::get('failed'))
    <script>
      Swal.fire({
        icon: "error",
        title: "Login Gagal",
        text: "Username atau Password yang Anda masukkan salah. Silakan coba lagi.",
        confirmButtonColor: 'var(--app-danger)',
        customClass: { popup: 'swal2-popup' } // Apply custom class if needed
      });
    </script>
@endif

@if ($message = Session::get('success')) 
    <script>
      Swal.fire({
        icon: "success",
        title: "Logout Berhasil",
        text: "Anda telah berhasil keluar.",
        timer: 2000, // Auto close after 2 seconds
        showConfirmButton: false,
        customClass: { popup: 'swal2-popup' }
      });
    </script>
@endif

{{-- Bootstrap 5 Form Validation Script --}}
<script>
    (function () {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
        })
    })()
</script>

{{-- Remove old AdminLTE/Bootstrap 4 JS --}}

</body>
</html>
