<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Osaro's Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .register-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
        }
        .register-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-logo h2 {
            color: #1a1a2e;
            font-weight: bold;
        }
        .register-logo i {
            font-size: 3rem;
            color: #f0c040;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #f0c040;
            box-shadow: 0 0 0 0.2rem rgba(240,192,64,0.25);
        }
        .btn-register {
            background: linear-gradient(135deg, #f0c040, #d4a800);
            border: none;
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
        }
        .btn-register:hover {
            background: linear-gradient(135deg, #d4a800, #b38f00);
            color: #1a1a2e;
        }
        .form-label {
            font-weight: bold;
            color: #1a1a2e;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="register-card">
                <div class="register-logo">
                    <i class="fas fa-book-open"></i>
                    <h2>Osaro's Library</h2>
                    <p class="text-muted">Create your account</p>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form method="POST" action="/register">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user text-warning"></i> Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-envelope text-warning"></i> Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-lock text-warning"></i> Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-lock text-warning"></i> Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                    </div>
                    <div class="text-center">
                        <p class="text-muted">Already have an account? <a href="/login" style="color:#f0c040; font-weight:bold;">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>