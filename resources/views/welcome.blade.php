<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osaro's Library - Your Digital Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a0a0f;
            color: #ffffff;
        }
        /* Navbar */
        .navbar {
            background: rgba(10, 10, 15, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px 0;
            border-bottom: 1px solid rgba(240, 192, 64, 0.2);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #f0c040 !important;
            letter-spacing: 1px;
        }
        .navbar-brand span {
            color: white;
        }
        .nav-link {
            color: #ccc !important;
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: color 0.3s;
            margin: 0 5px;
        }
        .nav-link:hover {
            color: #f0c040 !important;
        }
        .btn-nav {
            background: #f0c040;
            color: #0a0a0f !important;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btn-nav:hover {
            background: #d4a800;
            transform: translateY(-2px);
        }

        /* Hero */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0a0f 0%, #0f1923 50%, #0a0a0f 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(240,192,64,0.08) 0%, transparent 70%);
            top: -100px;
            right: -100px;
        }
        .hero::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(240,192,64,0.05) 0%, transparent 70%);
            bottom: -100px;
            left: -100px;
        }
        .hero-badge {
            display: inline-block;
            background: rgba(240,192,64,0.1);
            border: 1px solid rgba(240,192,64,0.3);
            color: #f0c040;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 25px;
        }
        .hero h1 span {
            color: #f0c040;
        }
        .hero p {
            font-size: 1.2rem;
            color: #aaa;
            line-height: 1.8;
            max-width: 500px;
            margin-bottom: 40px;
        }
        .btn-hero-primary {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 15px 35px;
            border-radius: 5px;
            border: none;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-hero-primary:hover {
            background: #d4a800;
            color: #0a0a0f;
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(240,192,64,0.3);
        }
        .btn-hero-secondary {
            background: transparent;
            color: #fff;
            font-weight: 600;
            padding: 15px 35px;
            border-radius: 5px;
            border: 1px solid rgba(255,255,255,0.2);
            font-size: 1rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-left: 15px;
        }
        .btn-hero-secondary:hover {
            border-color: #f0c040;
            color: #f0c040;
            transform: translateY(-3px);
        }
        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 60px;
        }
        .hero-stat h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #f0c040;
            font-weight: 700;
        }
        .hero-stat p {
            font-size: 0.9rem;
            color: #777;
            margin: 0;
        }
        .hero-image {
            position: relative;
        }
        .hero-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }
        .hero-card:hover {
            border-color: rgba(240,192,64,0.3);
            transform: translateX(5px);
        }
        .hero-card i {
            color: #f0c040;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .hero-card h5 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .hero-card p {
            font-size: 0.85rem;
            color: #777;
            margin: 0;
        }

        /* Features */
        .features {
            padding: 120px 0;
            background: #0d0d15;
        }
        .section-badge {
            display: inline-block;
            background: rgba(240,192,64,0.1);
            border: 1px solid rgba(240,192,64,0.3);
            color: #f0c040;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .section-subtitle {
            color: #777;
            font-size: 1.1rem;
            max-width: 500px;
            margin: 0 auto 60px;
        }
        .feature-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 15px;
            padding: 40px 30px;
            height: 100%;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #f0c040, transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .feature-card:hover {
            border-color: rgba(240,192,64,0.2);
            transform: translateY(-10px);
            background: rgba(240,192,64,0.03);
        }
        .feature-card:hover::before {
            opacity: 1;
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            background: rgba(240,192,64,0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }
        .feature-icon i {
            font-size: 1.5rem;
            color: #f0c040;
        }
        .feature-card h4 {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        .feature-card p {
            color: #777;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        /* Request Section */
        .request-section {
            padding: 120px 0;
            background: #0a0a0f;
        }
        .request-card {
            background: linear-gradient(135deg, rgba(240,192,64,0.08), rgba(240,192,64,0.02));
            border: 1px solid rgba(240,192,64,0.2);
            border-radius: 20px;
            padding: 80px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .request-card::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(240,192,64,0.1) 0%, transparent 70%);
            top: -100px;
            right: -100px;
        }
        .request-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .request-card p {
            color: #aaa;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }

        /* Footer */
        .footer {
            background: #060609;
            border-top: 1px solid rgba(255,255,255,0.05);
            padding: 40px 0;
        }
        .footer p {
            color: #555;
            margin: 0;
        }
        .footer a {
            color: #f0c040;
            text-decoration: none;
        }
        .footer a:hover {
            color: #d4a800;
        }
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

<!-- Hero -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-badge">
                    <i class="fas fa-star me-2"></i>Premium Digital Library
                </div>
                <h1>Your Knowledge<br><span>Hub</span> Awaits</h1>
                <p>Access thousands of books, research papers, and academic materials from anywhere in the world. Learn, grow, and succeed.</p>
                <div>
                    <a href="/books" class="btn-hero-primary">
                        <i class="fas fa-search me-2"></i>Browse Books
                    </a>
                    <a href="/register" class="btn-hero-secondary">
                        Get Started Free
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="hero-stat">
                        <h3>100+</h3>
                        <p>Books Available</p>
                    </div>
                    <div class="hero-stat">
                        <h3>50+</h3>
                        <p>Active Users</p>
                    </div>
                    <div class="hero-stat">
                        <h3>24h</h3>
                        <p>Book Requests</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="hero-card">
                    <i class="fas fa-search"></i>
                    <h5>Smart Search</h5>
                    <p>Find any book instantly by title, author or category</p>
                </div>
                <div class="hero-card ms-4">
                    <i class="fas fa-bookmark"></i>
                    <h5>Save & Download</h5>
                    <p>Bookmark favorites and download PDFs for offline reading</p>
                </div>
                <div class="hero-card">
                    <i class="fas fa-hand-paper"></i>
                    <h5>Book Requests</h5>
                    <p>Can't find a book? Request it and get it within 24-48 hours</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-badge">Why Choose Us</div>
            <h2 class="section-title">Everything You Need<br>In One Place</h2>
            <p class="section-subtitle">A complete digital library experience designed for students and researchers</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h4>Easy Search</h4>
                    <p>Find any book instantly using our powerful search and filter system.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <h4>Save Books</h4>
                    <p>Bookmark your favourite books and access them from your dashboard.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-download"></i>
                    </div>
                    <h4>Download PDF</h4>
                    <p>Download books as PDFs and read them offline anytime anywhere.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>24-48hr Requests</h4>
                    <p>Request any book and we will add it to the library within 24-48 hours.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Request Section -->
<section class="request-section">
    <div class="container">
        <div class="request-card">
            <h2>Can't Find Your Book?</h2>
            <p>Request any book and we will upload it to the library within <strong style="color:#f0c040;">24-48 hours!</strong></p>
            @auth
                <a href="/requests/create" class="btn-hero-primary">
                    <i class="fas fa-paper-plane me-2"></i>Request a Book
                </a>
            @else
                <a href="/register" class="btn-hero-primary">
                    <i class="fas fa-user-plus me-2"></i>Register to Request
                </a>
            @endauth
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p>&copy; 2026 Osaro's Library. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p>
                    <a href="/books">Books</a> &nbsp;|&nbsp;
                    <a href="/register">Register</a> &nbsp;|&nbsp;
                    <a href="/requests">Requests</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>