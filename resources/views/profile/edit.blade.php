<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Osaro's Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: #0a0a0f; color: #ffffff; }
        .navbar {
            background: rgba(10, 10, 15, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px 0;
            border-bottom: 1px solid rgba(240, 192, 64, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #f0c040 !important;
        }
        .navbar-brand span { color: white; }
        .nav-link { color: #aaa !important; font-weight: 500; transition: color 0.3s; margin: 0 5px; }
        .nav-link:hover { color: #f0c040 !important; }
        .btn-nav {
            background: #f0c040;
            color: #0a0a0f !important;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 5px;
            transition: all 0.3s;
            border: none;
        }
        .btn-nav:hover { background: #d4a800; transform: translateY(-2px); }
        .page-header {
            background: linear-gradient(135deg, #0f1923, #0a0a0f);
            padding: 60px 0;
            border-bottom: 1px solid rgba(255,255,255,0.04);
        }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 700; }
        .page-subtitle { color: #666; margin-top: 8px; }
        .main-content { padding: 60px 0; }
        .profile-avatar {
            width: 80px;
            height: 80px;
            background: rgba(240,192,64,0.1);
            border: 2px solid rgba(240,192,64,0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #f0c040;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .profile-name { font-size: 1.3rem; font-weight: 600; margin-bottom: 5px; }
        .profile-email { color: #666; font-size: 0.9rem; }
        .form-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 35px;
            margin-bottom: 25px;
        }
        .form-card-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 5px;
        }
        .form-card-subtitle {
            color: #666;
            font-size: 0.85rem;
            margin-bottom: 25px;
        }
        .form-label { color: #888; font-size: 0.82rem; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 8px; }
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
        .btn-submit {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 12px 25px;
            border-radius: 8px;
            border: none;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .btn-submit:hover { background: #d4a800; transform: translateY(-2px); box-shadow: 0 10px 25px rgba(240,192,64,0.2); }
        .btn-danger {
            background: rgba(220,53,69,0.08);
            border: 1px solid rgba(220,53,69,0.2);
            color: #ff6b7a;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-danger:hover { background: rgba(220,53,69,0.15); }
        .alert-success {
            background: rgba(40,167,69,0.1);
            border: 1px solid rgba(40,167,69,0.2);
            color: #5cb85c;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .alert-danger {
            background: rgba(220,53,69,0.1);
            border: 1px solid rgba(220,53,69,0.2);
            color: #ff6b7a;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .danger-zone {
            border-color: rgba(220,53,69,0.15) !important;
        }
        .footer {
            background: #060609;
            border-top: 1px solid rgba(255,255,255,0.04);
            padding: 30px 0;
            margin-top: 60px;
        }
        .footer p { color: #333; margin: 0; font-size: 0.85rem; }
        .footer a { color: #f0c040; text-decoration: none; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-book-open me-2"></i>Osaro's<span>Library</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="/profile" style="color:#f0c040 !important;">Profile</a></li>
                <li class="nav-item ms-2">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-nav">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="page-title">My Profile</div>
        <div class="page-subtitle">Manage your account settings</div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="row">
            <!-- Left Side - Avatar -->
            <div class="col-md-3 mb-4 text-center">
                <div class="profile-avatar mx-auto">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-email">{{ auth()->user()->email }}</div>
            </div>

            <!-- Right Side - Forms -->
            <div class="col-md-9">

                @if(session('success'))
                    <div class="alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
                @endif

                <!-- Update Profile -->
                <div class="form-card">
                    <div class="form-card-title">Profile Information</div>
                    <div class="form-card-subtitle">Update your name and email address</div>

                    @if($errors->has('name') || $errors->has('email'))
                        <div class="alert-danger">
                            @foreach($errors->only(['name', 'email']) as $error)
                                <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/profile">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save me-2"></i>Save Changes
                        </button>
                    </form>
                </div>

                <!-- Update Password -->
                <div class="form-card">
                    <div class="form-card-title">Change Password</div>
                    <div class="form-card-subtitle">Make sure to use a strong password</div>

                    @if($errors->has('current_password') || $errors->has('password'))
                        <div class="alert-danger">
                            @foreach($errors->only(['current_password', 'password']) as $error)
                                <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/profile/password">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control" placeholder="Enter current password" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter new password" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-lock me-2"></i>Update Password
                        </button>
                    </form>
                </div>

                <!-- Delete Account -->
                <div class="form-card danger-zone">
                    <div class="form-card-title" style="color:#ff6b7a;">Danger Zone</div>
                    <div class="form-card-subtitle">Once you delete your account, there is no going back</div>
                    <form method="POST" action="/profile">
                        @csrf
                        @method('DELETE')
                        <div class="mb-4">
                            <label class="form-label">Enter Password to Confirm</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn-danger" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone!')">
                            <i class="fas fa-trash me-2"></i>Delete Account
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6"><p>&copy; 2026 Osaro's Library. All rights reserved.</p></div>
            <div class="col-md-6 text-md-end"><p><a href="/">Home</a> &nbsp;|&nbsp; <a href="/books">Books</a></p></div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>