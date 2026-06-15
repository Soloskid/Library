<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} - Osaro's Library</title>
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
        .book-section { padding: 80px 0; }
        .book-cover-wrapper {
            position: sticky;
            top: 100px;
        }
        .book-cover {
            width: 100%;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
            border: 1px solid rgba(255,255,255,0.05);
        }
        .book-badge {
            display: inline-block;
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.2);
            color: #f0c040;
            padding: 5px 14px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
        }
        .book-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 15px;
        }
        .book-author {
            color: #888;
            font-size: 1rem;
            margin-bottom: 25px;
        }
        .book-author span { color: #f0c040; font-weight: 600; }
        .divider {
            height: 1px;
            background: rgba(255,255,255,0.06);
            margin: 30px 0;
        }
        .description-title {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #555;
            margin-bottom: 15px;
        }
        .description-text {
            color: #888;
            line-height: 1.9;
            font-size: 0.95rem;
        }
        .btn-save {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-save:hover { border-color: #f0c040; color: #f0c040; background: rgba(240,192,64,0.05); }
        .btn-download {
            background: #f0c040;
            border: none;
            color: #0a0a0f;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-download:hover {
            background: #d4a800;
            color: #0a0a0f;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(240,192,64,0.2);
        }
        .btn-back {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.08);
            color: #666;
            font-weight: 500;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-back:hover { border-color: rgba(255,255,255,0.2); color: #fff; }
        .btn-login {
            background: #f0c040;
            border: none;
            color: #0a0a0f;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-login:hover { background: #d4a800; color: #0a0a0f; transform: translateY(-2px); }
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
                @auth
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/requests">My Requests</a></li>
                    <li class="nav-item ms-2">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-nav">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item ms-2"><a class="btn btn-nav" href="/register">Get Started</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Book Details -->
<div class="book-section">
    <div class="container">
        <div class="row g-5">
            <!-- Book Cover -->
            <div class="col-md-4">
                <div class="book-cover-wrapper">
                    <img src="{{ $book->cover_image ? $book->cover_image : 'https://via.placeholder.com/400x500/0d0d15/f0c040?text='.urlencode($book->title) }}" class="book-cover" alt="{{ $book->title }}">
                </div>
            </div>

            <!-- Book Info -->
            <div class="col-md-8">
                @if(session('success'))
                    <div class="alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div class="alert-danger"><i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}</div>
                @endif

                <div class="book-badge">{{ $book->category }}</div>
                <h1 class="book-title">{{ $book->title }}</h1>
                <div class="book-author">by <span>{{ $book->author }}</span></div>

                <div class="divider"></div>

                <div class="description-title">About this book</div>
                <div class="description-text">{{ $book->description }}</div>

                <div class="divider"></div>

                <div class="d-flex flex-wrap gap-3">
                    @auth
                    <form method="POST" action="/save/{{ $book->id }}">
                        @csrf
                        <button class="btn-save">
                            <i class="fas fa-bookmark"></i> Save Book
                        </button>
                    </form>

                    @if($book->file_path)
                    <a href="{{ $book->file_path }}" class="btn-download" target="_blank">
                        <i class="fas fa-download"></i> View/Download PDF
                    </a>
                    @endif

                    @else
                    <a href="/login" class="btn-login">
                        <i class="fas fa-sign-in-alt"></i> Login to Save & Download
                    </a>
                    @endauth

                    <a href="/books" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Back to Books
                    </a>
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