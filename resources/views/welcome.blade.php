<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osaro's Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
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
        .hero {
            background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
            color: white;
            padding: 150px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .hero p {
            font-size: 1.3rem;
            color: #ccc;
        }
        .features {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
        .feature-card {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-icon {
            font-size: 3rem;
            color: #f0c040;
            margin-bottom: 15px;
        }
        .stats {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        .stat-number {
            font-size: 3rem;
            font-weight: bold;
            color: #f0c040;
        }
        .request-section {
            background-color: #f8f9fa;
            padding: 80px 0;
            text-align: center;
        }
        .request-card {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: white;
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }
        .footer {
            background-color: #1a1a2e;
            color: #ccc;
            text-align: center;
            padding: 30px;
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
        <a class="navbar-brand" href="#">
            <i class="fas fa-book-open"></i> Osaro's Library
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/requests">My Requests</a></li>
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

<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <h1><i class="fas fa-book-reader"></i> Welcome to Osaro's Library</h1>
        <p class="mt-3">Search, Save and Read books online from anywhere in the world</p>
        <div class="mt-4">
            <a href="/books" class="btn btn-warning btn-lg me-3">
                <i class="fas fa-search"></i> Browse Books
            </a>
            <a href="/register" class="btn btn-outline-light btn-lg">
                <i class="fas fa-user-plus"></i> Get Started
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="features">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Why Use Osaro's Library?</h2>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Easy Search</h4>
                    <p class="text-muted">Find any book quickly using our powerful search system by title, author or category.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <h4>Save Books</h4>
                    <p class="text-muted">Bookmark your favourite books and access them anytime from your personal dashboard.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h4>Download PDF</h4>
                    <p class="text-muted">Download books as PDF files and read them offline at your own convenience.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-hand-paper"></i>
                    </div>
                    <h4>Request Books</h4>
                    <p class="text-muted">Can't find a book? Request it and we will upload it within 24-48 hours!</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="stat-number"><i class="fas fa-books"></i> 100+</div>
                <p>Books Available</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-number"><i class="fas fa-users"></i> 50+</div>
                <p>Registered Users</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="stat-number"><i class="fas fa-download"></i> 200+</div>
                <p>Books Downloaded</p>
            </div>
        </div>
    </div>
</div>

<!-- Request Section -->
<div class="request-section">
    <div class="container">
        <div class="request-card">
            <h2 class="fw-bold"><i class="fas fa-hand-paper text-warning"></i> Can't Find Your Book?</h2>
            <p class="mt-3" style="color:#ccc; font-size:1.1rem;">Request any book and we will upload it to the library within <strong style="color:#f0c040;">24-48 hours!</strong></p>
            <div class="mt-4">
                @auth
                    <a href="/requests/create" class="btn btn-warning btn-lg">
                        <i class="fas fa-paper-plane"></i> Request a Book
                    </a>
                @else
                    <a href="/register" class="btn btn-warning btn-lg">
                        <i class="fas fa-user-plus"></i> Register to Request
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2026 Osaro's Library. All rights reserved. |
        <a href="/books">Browse Books</a> |
        <a href="/register">Register</a> |
        <a href="/requests">My Requests</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>