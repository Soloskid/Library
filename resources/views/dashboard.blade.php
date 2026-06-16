<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Osaro's Library</title>
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
            position: relative;
            overflow: hidden;
        }
        .page-header::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(240,192,64,0.05) 0%, transparent 70%);
            top: -150px;
            right: -100px;
        }
        .welcome-text { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 700; }
        .welcome-text span { color: #f0c040; }
        .welcome-sub { color: #666; margin-top: 8px; }
        .stat-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 30px;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
            color: #fff;
        }
        .stat-card:hover {
            border-color: rgba(240,192,64,0.3);
            transform: translateY(-3px);
            background: rgba(240,192,64,0.03);
            color: #fff;
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(240,192,64,0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .stat-icon i { color: #f0c040; font-size: 1.3rem; }
        .stat-number { font-size: 2rem; font-weight: 700; margin-bottom: 5px; }
        .stat-label { color: #666; font-size: 0.85rem; }
        .request-btn {
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.2);
            color: #f0c040;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        .request-btn:hover { background: rgba(240,192,64,0.15); color: #f0c040; transform: translateY(-2px); }
        .section-title { font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 25px; }
        .book-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s;
            height: 100%;
        }
        .book-card:hover {
            border-color: rgba(240,192,64,0.2);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }
        .book-card img { width: 100%; height: 200px; object-fit: cover; }
        .book-card-body { padding: 20px; }
        .book-category {
            display: inline-block;
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.15);
            color: #f0c040;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .book-title { font-weight: 600; font-size: 0.95rem; margin-bottom: 5px; }
        .book-author { color: #666; font-size: 0.82rem; margin-bottom: 15px; }
        .btn-view {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view:hover { border-color: #f0c040; color: #f0c040; }
        .btn-remove {
            background: rgba(220,53,69,0.08);
            border: 1px solid rgba(220,53,69,0.2);
            color: #ff6b7a;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-remove:hover { background: rgba(220,53,69,0.15); }
        .empty-state { text-align: center; padding: 80px 0; }
        .empty-state i { font-size: 4rem; color: #1a1a1a; margin-bottom: 20px; }
        .empty-state h4 { color: #444; margin-bottom: 10px; }
        .empty-state p { color: #333; margin-bottom: 25px; }
        .btn-browse {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-browse:hover { background: #d4a800; color: #0a0a0f; transform: translateY(-2px); }
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
        .main-content { padding: 60px 0; }
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
                <li class="nav-item"><a class="nav-link active" href="/dashboard" style="color:#f0c040 !important;">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/requests">My Requests</a></li>
                <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
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
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="welcome-text">Welcome back, <span>{{ auth()->user()->name }}</span></div>
                <div class="welcome-sub">Here's an overview of your library activity</div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <a href="/requests/create" class="request-btn">
                    <i class="fas fa-plus me-2"></i>Request a Book
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">

        <!-- Stats -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <a href="#saved-books" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-bookmark"></i></div>
                    <div class="stat-number">{{ $savedBooks->count() }}</div>
                    <div class="stat-label">Saved Books</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/profile" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-user"></i></div>
                    <div class="stat-number" style="font-size:1.2rem; margin-top:8px;">{{ auth()->user()->name }}</div>
                    <div class="stat-label">Your Account → Click to edit</div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/requests" class="stat-card">
                    <div class="stat-icon"><i class="fas fa-list"></i></div>
                    <div class="stat-number" style="font-size:1.2rem; margin-top:8px;">My Requests</div>
                    <div class="stat-label">View all your book requests</div>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-danger"><i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}</div>
        @endif

        <!-- Saved Books -->
        <div id="saved-books">
            <div class="section-title"><i class="fas fa-bookmark me-2" style="color:#f0c040;"></i>My Saved Books</div>

            <div class="row g-4">
                @forelse($savedBooks as $saved)
                <div class="col-md-3">
                    <div class="book-card">
                        <img src="{{ $saved->book->cover_image ? $saved->book->cover_image : 'https://via.placeholder.com/300x200/0d0d15/f0c040?text='.urlencode($saved->book->title) }}" alt="{{ $saved->book->title }}">
                        <div class="book-card-body">
                            <div class="book-category">{{ $saved->book->category }}</div>
                            <div class="book-title">{{ $saved->book->title }}</div>
                            <div class="book-author"><i class="fas fa-user me-1"></i>{{ $saved->book->author }}</div>
                            <div class="d-flex gap-2">
                                <a href="/books/{{ $saved->book->id }}" class="btn-view">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                                <form method="POST" action="/unsave/{{ $saved->book->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-remove">
                                        <i class="fas fa-trash me-1"></i>Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state">
                        <i class="fas fa-bookmark"></i>
                        <h4>No saved books yet</h4>
                        <p>Start saving books to see them here</p>
                        <a href="/books" class="btn-browse">
                            <i class="fas fa-search me-2"></i>Browse Books
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6"><p>&copy; 2026 Osaro's Library. All rights reserved.</p></div>
            <div class="col-md-6 text-md-end"><p><a href="/">Home</a> &nbsp;|&nbsp; <a href="/books">Books</a> &nbsp;|&nbsp; <a href="/requests">My Requests</a></p></div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>