<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Osaro's Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0f;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .register-wrapper {
            width: 100%;
            min-height: 100vh;
            display: flex;
        }
        .register-left {
            flex: 1;
            background: linear-gradient(135deg, #0f1923, #0a0a0f);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }
        .register-left::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(240,192,64,0.06) 0%, transparent 70%);
            top: -100px;
            right: -100px;
        }
        .register-left-content { position: relative; z-index: 1; max-width: 400px; }
        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #f0c040;
            margin-bottom: 40px;
            display: block;
            text-decoration: none;
        }
        .brand i { margin-right: 10px; }
        .register-left h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 20px;
        }
        .register-left h2 span { color: #f0c040; }
        .register-left p { color: #666; line-height: 1.8; margin-bottom: 40px; }
        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        .feature-dot {
            width: 35px;
            height: 35px;
            background: rgba(240,192,64,0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .feature-dot i { color: #f0c040; font-size: 0.9rem; }
        .feature-item p { color: #888; font-size: 0.9rem; margin: 0; }
        .register-right {
            width: 480px;
            background: #0d0d15;
            border-left: 1px solid rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 50px;
        }
        .register-form-wrapper { width: 100%; }
        .register-form-wrapper h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .register-form-wrapper p { color: #666; font-size: 0.9rem; margin-bottom: 35px; }
        .form-label { color: #888; font-size: 0.85rem; font-weight: 500; margin-bottom: 8px; }
        .form-control {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 14px 16px;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: rgba(240,192,64,0.03);
            border-color: rgba(240,192,64,0.3);
            box-shadow: 0 0 0 3px rgba(240,192,64,0.08);
            color: #fff;
        }
        .form-control::placeholder { color: #444; }
        .btn-register {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 14px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s;
            letter-spacing: 0.5px;
        }
        .btn-register:hover {
            background: #d4a800;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(240,192,64,0.2);
        }
        .divider {
            display: flex;
            align-items: center;
            gap: 15px;
            margin: 25px 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,0.06);
        }
        .divider span { color: #444; font-size: 0.8rem; }
        .login-link {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
        }
        .login-link a { color: #f0c040; text-decoration: none; font-weight: 600; }
        .login-link a:hover { color: #d4a800; }
        .alert-danger {
            background: rgba(220,53,69,0.1);
            border: 1px solid rgba(220,53,69,0.2);
            color: #ff6b7a;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        @media (max-width: 768px) {
            .register-left { display: none; }
            .register-right { width: 100%; }
        }
    </style>
</head>
<body>
<div class="register-wrapper">
    <!-- Left Side -->
    <div class="register-left">
        <div class="register-left-content">
            <a href="/" class="brand"><i class="fas fa-book-open"></i>Osaro's Library</a>
            <h2>Join Our <span>Knowledge</span> Community</h2>
            <p>Create a free account and get instant access to thousands of books, PDFs and academic materials.</p>
            <div class="feature-item">
                <div class="feature-dot"><i class="fas fa-search"></i></div>
                <p>Search and browse thousands of books</p>
            </div>
            <div class="feature-item">
                <div class="feature-dot"><i class="fas fa-bookmark"></i></div>
                <p>Save your favourite books to your dashboard</p>
            </div>
            <div class="feature-item">
                <div class="feature-dot"><i class="fas fa-download"></i></div>
                <p>Download PDFs and read offline anytime</p>
            </div>
            <div class="feature-item">
                <div class="feature-dot"><i class="fas fa-hand-paper"></i></div>
                <p>Request any book and get it in 24-48 hours</p>
            </div>
        </div>
    </div>

    <!-- Right Side -->
    <div class="register-right">
        <div class="register-form-wrapper">
            <h3>Create Account</h3>
            <p>Fill in your details to get started for free</p>

            @if($errors->any())
                <div class="alert-danger">
                    @foreach($errors->all() as $error)
                        <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                </div>
                <button type="submit" class="btn-register">
                    <i class="fas fa-user-plus me-2"></i>Create Account
                </button>
            </form>

            <div class="divider"><span>OR</span></div>

            <div class="login-link">
                Already have an account? <a href="/login">Sign in here</a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>