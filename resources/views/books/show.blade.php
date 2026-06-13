<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details - Osaro's Library</title>
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
        .book-cover {
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            max-height: 400px;
            object-fit: cover;
        }
        .book-details-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .book-title {
            font-size: 2rem;
            font-weight: bold;
            color: #1a1a2e;
        }
        .book-author {
            font-size: 1.2rem;
            color: #666;
        }
        .btn-download {
            background: linear-gradient(135deg, #f0c040, #d4a800);
            border: none;
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .btn-download:hover {
            background: linear-gradient(135deg, #d4a800, #b38f00);
            color: #1a1a2e;
        }
        .btn-save {
            background-color: #1a1a2e;
            border: none;
            color: white;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
        }
        .btn-save:hover {
            background-color: #0f3460;
            color: white;
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
                @auth
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item">
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="btn btn-warning btn-sm mt-1">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1><i class="fas fa-book"></i> Book Details</h1>
        <p class="mt-2" style="color:#ccc;">View and download book information</p>
    </div>
</div>

<!-- Book Details -->
<div class="container">
    <div class="row">
        <!-- Book Cover -->
        <div class="col-md-4 mb-4">
            <img src="{{ $book->cover_image ? $book->cover_image : 'https://via.placeholder.com/300x400?text=No+Cover' }}" class="book-cover" alt="{{ $book->title }}">
        </div>

        <!-- Book Info -->
        <div class="col-md-8">
            <div class="book-details-card">

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

                <h1 class="book-title">{{ $book->title }}</h1>
                <p class="book-author mt-2">
                    <i class="fas fa-user text-warning"></i> {{ $book->author }}
                </p>
                <p class="mt-2">
                    <span class="badge bg-warning text-dark fs-6">{{ $book->category }}</span>
                </p>

                <hr>

                <h5 class="fw-bold mt-4"><i class="fas fa-align-left text-warning"></i> Description</h5>
                <p class="text-muted">{{ $book->description }}</p>

                <hr>

                <div class="d-flex gap-3 mt-4 flex-wrap">
                    @auth
                    <form method="POST" action="/save/{{ $book->id }}">
                        @csrf
                        <button class="btn btn-save">
                            <i class="fas fa-bookmark"></i> Save Book
                        </button>
                    </form>

                    @if($book->file_path)
                    <a href="{{ $book->file_path }}" class="btn btn-download" target="_blank">
                        <i class="fas fa-download"></i> View/Download PDF
                    </a>
                    @endif

                    @else
                    <a href="/login" class="btn btn-save">
                        <i class="fas fa-sign-in-alt"></i> Login to Save & Download
                    </a>
                    @endauth

                    <a href="/books" class="btn btn-outline-dark">
                        <i class="fas fa-arrow-left"></i> Back to Books
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2026 Osaro's Library. All rights reserved. |
        <a href="/">Home</a> |
        <a href="/books">Books</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>