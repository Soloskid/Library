<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Osaro's Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #1a1a2e;
            padding: 15px 0;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #f0c040 !important;
        }
        .page-header {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: white;
            padding: 60px 0;
            text-align: center;
            margin-bottom: 40px;
        }
        .page-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .card {
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .stats-icon {
            font-size: 2.5rem;
            color: #f0c040;
            margin-bottom: 10px;
        }
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: #1a1a2e;
        }
        .footer {
            background-color: #1a1a2e;
            color: #ccc;
            text-align: center;
            padding: 30px;
            margin-top: 50px;
        }
        .footer a {
            color: #f0c040;
            text-decoration: none;
        }
        .btn-remove {
            background-color: #dc3545;
            border: none;
            color: white;
            font-weight: bold;
        }
        .btn-remove:hover {
            background-color: #b02a37;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">
            <i class="fas fa-book-open"></i> Osaro's Library
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                <li class="nav-item"><a class="nav-link active" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="/requests">My Requests</a></li>
                <li class="nav-item">
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="btn btn-warning btn-sm mt-1">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1><i class="fas fa-tachometer-alt"></i> My Dashboard</h1>
        <p class="mt-2" style="color:#ccc;">Welcome back, {{ auth()->user()->name }}!</p>
    </div>
</div>

<!-- Stats Section -->
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-bookmark"></i></div>
                <div class="stats-number">{{ $savedBooks->count() }}</div>
                <p class="text-muted">Saved Books</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-user"></i></div>
                <div class="stats-number">{{ auth()->user()->name }}</div>
                <p class="text-muted">Your Name</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-hand-paper"></i></div>
                <a href="/requests/create" class="btn btn-warning btn-lg mt-2">
                    <i class="fas fa-plus"></i> Request a Book
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h4 class="fw-bold mb-4"><i class="fas fa-bookmark"></i> My Saved Books</h4>

    <div class="row">
        @forelse($savedBooks as $saved)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $saved->book->cover_image ? $saved->book->cover_image : 'https://via.placeholder.com/200x300?text=No+Cover' }}" class="card-img-top" alt="{{ $saved->book->title }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $saved->book->title }}</h5>
                    <p class="card-text text-muted"><i class="fas fa-user"></i> {{ $saved->book->author }}</p>
                    <p class="card-text"><span class="badge bg-warning text-dark">{{ $saved->book->category }}</span></p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="/books/{{ $saved->book->id }}" class="btn btn-dark btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <form method="POST" action="/unsave/{{ $saved->book->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-remove btn-sm">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-bookmark fa-4x text-muted mb-3"></i>
                <p class="text-muted fs-5">No saved books yet.</p>
                <a href="/books" class="btn btn-warning btn-lg mt-2">
                    <i class="fas fa-search"></i> Browse Books
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2026 Osaro's Library. All rights reserved. |
        <a href="/">Home</a> |
        <a href="/books">Books</a> |
        <a href="/requests">My Requests</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>