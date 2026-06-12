<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - Osaro's Library</title>
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
        .verify-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            text-align: center;
        }
        .verify-icon {
            font-size: 4rem;
            color: #f0c040;
            margin-bottom: 20px;
        }
        .verify-card h2 {
            color: #1a1a2e;
            font-weight: bold;
        }
        .btn-verify {
            background: linear-gradient(135deg, #f0c040, #d4a800);
            border: none;
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .btn-verify:hover {
            background: linear-gradient(135deg, #d4a800, #b38f00);
            color: #1a1a2e;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="verify-card">
                <div class="verify-icon">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <h2>Verify Your Email</h2>
                <p class="text-muted mt-3">Thanks for registering! Before you can access Osaro's Library, please verify your email address by clicking the link we just sent to your email.</p>

                @if(session('status') == 'verification-link-sent')
                    <div class="alert alert-success mt-3">
                        A new verification link has been sent to your email!
                    </div>
                @endif

                <div class="mt-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-verify">
                            <i class="fas fa-paper-plane"></i> Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>

                <p class="text-muted mt-4" style="font-size:0.9rem;">
                    <i class="fas fa-info-circle text-warning"></i> 
                    Check your spam folder if you don't see the email.
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>