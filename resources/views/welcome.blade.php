<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osaro's Library - Your Premium Digital Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background-color: #0a0a0f; color: #ffffff; overflow-x: hidden; }

        /* Navbar */
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

        /* Hero */
        .hero {
            min-height: 100vh;
            background: radial-gradient(ellipse at top right, #1a1a2e 0%, #0a0a0f 60%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        .hero-glow-1 {
            position: absolute;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(240,192,64,0.06) 0%, transparent 70%);
            top: -200px;
            right: -200px;
            pointer-events: none;
        }
        .hero-glow-2 {
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(240,192,64,0.04) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
            pointer-events: none;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.25);
            color: #f0c040;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 30px;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 5rem;
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 25px;
        }
        .hero h1 span { color: #f0c040; }
        .hero p {
            font-size: 1.15rem;
            color: #888;
            line-height: 1.9;
            max-width: 480px;
            margin-bottom: 40px;
        }
        .btn-hero-primary {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 16px 38px;
            border-radius: 6px;
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
            box-shadow: 0 15px 35px rgba(240,192,64,0.25);
        }
        .btn-hero-secondary {
            background: transparent;
            color: #fff;
            font-weight: 600;
            padding: 16px 38px;
            border-radius: 6px;
            border: 1px solid rgba(255,255,255,0.15);
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
            gap: 50px;
            margin-top: 70px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .hero-stat h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: #f0c040;
            font-weight: 700;
            margin-bottom: 5px;
        }
        .hero-stat p { font-size: 0.85rem; color: #666; margin: 0; }

        /* Floating Cards */
        .floating-cards { position: relative; }
        .float-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
            transition: all 0.4s;
            animation: float 3s ease-in-out infinite;
        }
        .float-card:nth-child(2) { animation-delay: 0.5s; margin-left: 30px; }
        .float-card:nth-child(3) { animation-delay: 1s; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
        }
        .float-card:hover {
            border-color: rgba(240,192,64,0.3);
            background: rgba(240,192,64,0.04);
        }
        .float-card-icon {
            width: 45px;
            height: 45px;
            background: rgba(240,192,64,0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        .float-card-icon i { color: #f0c040; font-size: 1.2rem; }
        .float-card h5 { font-weight: 600; font-size: 1rem; margin-bottom: 5px; }
        .float-card p { font-size: 0.82rem; color: #666; margin: 0; }

        /* Marquee */
        .marquee-section {
            padding: 25px 0;
            background: rgba(240,192,64,0.04);
            border-top: 1px solid rgba(240,192,64,0.1);
            border-bottom: 1px solid rgba(240,192,64,0.1);
            overflow: hidden;
        }
        .marquee-content {
            display: flex;
            gap: 60px;
            animation: marquee 20s linear infinite;
            white-space: nowrap;
        }
        .marquee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .marquee-item i { color: #f0c040; }
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Features */
        .features { padding: 120px 0; background: #0d0d15; }
        .section-badge {
            display: inline-block;
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.2);
            color: #f0c040;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .section-subtitle { color: #666; font-size: 1rem; max-width: 450px; margin: 0 auto 60px; }
        .feature-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 40px 30px;
            height: 100%;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, #f0c040, transparent);
            opacity: 0;
            transition: opacity 0.4s;
        }
        .feature-card:hover {
            border-color: rgba(240,192,64,0.15);
            transform: translateY(-10px);
            background: rgba(240,192,64,0.02);
        }
        .feature-card:hover::after { opacity: 1; }
        .feature-icon {
            width: 55px;
            height: 55px;
            background: rgba(240,192,64,0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        .feature-card:hover .feature-icon { background: rgba(240,192,64,0.15); }
        .feature-icon i { font-size: 1.4rem; color: #f0c040; }
        .feature-card h4 { font-weight: 600; margin-bottom: 12px; font-size: 1.1rem; }
        .feature-card p { color: #666; line-height: 1.8; font-size: 0.92rem; margin: 0; }

        /* Books Preview */
        .books-preview { padding: 120px 0; background: #0a0a0f; }
        .book-preview-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s;
        }
        .book-preview-card:hover {
            border-color: rgba(240,192,64,0.2);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        }
        .book-preview-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .book-preview-body { padding: 20px; }
        .book-preview-body h5 { font-weight: 600; font-size: 1rem; margin-bottom: 5px; }
        .book-preview-body p { color: #666; font-size: 0.85rem; margin: 0; }
        .book-category {
            display: inline-block;
            background: rgba(240,192,64,0.1);
            color: #f0c040;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        /* Testimonials */
        .testimonials { padding: 120px 0; background: #0d0d15; }
        .testimonial-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 35px;
            height: 100%;
            transition: all 0.4s;
        }
        .testimonial-card:hover {
            border-color: rgba(240,192,64,0.15);
            transform: translateY(-5px);
        }
        .stars { color: #f0c040; margin-bottom: 20px; font-size: 0.9rem; }
        .testimonial-text {
            color: #aaa;
            line-height: 1.8;
            font-size: 0.95rem;
            margin-bottom: 25px;
            font-style: italic;
        }
        .testimonial-author { display: flex; align-items: center; gap: 15px; }
        .author-avatar {
            width: 45px;
            height: 45px;
            background: rgba(240,192,64,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f0c040;
            font-weight: 700;
            font-size: 1rem;
        }
        .author-name { font-weight: 600; font-size: 0.9rem; }
        .author-role { color: #666; font-size: 0.8rem; }

        /* Request Section */
        .request-section { padding: 120px 0; background: #0a0a0f; }
        .request-card {
            background: linear-gradient(135deg, rgba(240,192,64,0.06), rgba(240,192,64,0.01));
            border: 1px solid rgba(240,192,64,0.15);
            border-radius: 24px;
            padding: 90px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .request-card::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(240,192,64,0.08) 0%, transparent 70%);
            top: -150px;
            right: -100px;
        }
        .request-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .request-card p { color: #888; font-size: 1.1rem; margin-bottom: 40px; }

        /* Footer */
        .footer {
            background: #060609;
            border-top: 1px solid rgba(255,255,255,0.04);
            padding: 50px 0 30px;
        }
        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: #f0c040;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .footer-desc { color: #444; font-size: 0.9rem; max-width: 250px; }
        .footer-links h6 { color: #888; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; }
        .footer-links a { display: block; color: #555; text-decoration: none; margin-bottom: 10px; font-size: 0.9rem; transition: color 0.3s; }
        .footer-links a:hover { color: #f0c040; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.04); margin-top: 40px; padding-top: 25px; }
        .footer-bottom p { color: #333; font-size: 0.85rem; margin: 0; }
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
    <div class="hero-glow-1"></div>
    <div class="hero-glow-2"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-badge">
                    <i class="fas fa-star"></i> Premium Digital Library
                </div>
                <h1>Your Knowledge<br><span>Hub</span> Awaits</h1>
                <p>Access thousands of books, research papers, and academic materials from anywhere in the world.</p>
                <div>
                    <a href="/books" class="btn-hero-primary">
                        <i class="fas fa-search me-2"></i>Browse Books
                    </a>
                    <a href="/register" class="btn-hero-secondary">Get Started Free</a>
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
                        <p>Request Fulfillment</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="floating-cards">
                    <div class="float-card">
                        <div class="float-card-icon"><i class="fas fa-search"></i></div>
                        <h5>Smart Search</h5>
                        <p>Find any book instantly by title, author or category</p>
                    </div>
                    <div class="float-card">
                        <div class="float-card-icon"><i class="fas fa-bookmark"></i></div>
                        <h5>Save & Download</h5>
                        <p>Bookmark favorites and download PDFs for offline reading</p>
                    </div>
                    <div class="float-card">
                        <div class="float-card-icon"><i class="fas fa-hand-paper"></i></div>
                        <h5>Book Requests</h5>
                        <p>Request any book and get it within 24-48 hours</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Marquee -->
<div class="marquee-section">
    <div class="marquee-content">
        <div class="marquee-item"><i class="fas fa-book"></i> Fiction</div>
        <div class="marquee-item"><i class="fas fa-flask"></i> Science</div>
        <div class="marquee-item"><i class="fas fa-laptop-code"></i> Technology</div>
        <div class="marquee-item"><i class="fas fa-history"></i> History</div>
        <div class="marquee-item"><i class="fas fa-calculator"></i> Mathematics</div>
        <div class="marquee-item"><i class="fas fa-cogs"></i> Engineering</div>
        <div class="marquee-item"><i class="fas fa-heartbeat"></i> Medicine</div>
        <div class="marquee-item"><i class="fas fa-balance-scale"></i> Law</div>
        <div class="marquee-item"><i class="fas fa-palette"></i> Arts</div>
        <div class="marquee-item"><i class="fas fa-book"></i> Fiction</div>
        <div class="marquee-item"><i class="fas fa-flask"></i> Science</div>
        <div class="marquee-item"><i class="fas fa-laptop-code"></i> Technology</div>
        <div class="marquee-item"><i class="fas fa-history"></i> History</div>
        <div class="marquee-item"><i class="fas fa-calculator"></i> Mathematics</div>
        <div class="marquee-item"><i class="fas fa-cogs"></i> Engineering</div>
        <div class="marquee-item"><i class="fas fa-heartbeat"></i> Medicine</div>
        <div class="marquee-item"><i class="fas fa-balance-scale"></i> Law</div>
        <div class="marquee-item"><i class="fas fa-palette"></i> Arts</div>
    </div>
</div>

<!-- Features -->
<section class="features">
    <div class="container">
        <div class="text-center">
            <div class="section-badge">Why Choose Us</div>
            <h2 class="section-title">Everything You Need<br>In One Place</h2>
            <p class="section-subtitle">A complete digital library experience designed for students and researchers</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-search"></i></div>
                    <h4>Easy Search</h4>
                    <p>Find any book instantly using our powerful search and filter system by title, author or category.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-bookmark"></i></div>
                    <h4>Save Books</h4>
                    <p>Bookmark your favourite books and access them anytime from your personal dashboard.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-download"></i></div>
                    <h4>Download PDF</h4>
                    <p>Download books as PDFs and read them offline at your own convenience anywhere.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-clock"></i></div>
                    <h4>24-48hr Requests</h4>
                    <p>Request any book not in our library and we will add it within 24-48 hours guaranteed.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Books Preview -->
<section class="books-preview">
    <div class="container">
        <div class="text-center">
            <div class="section-badge">Our Collection</div>
            <h2 class="section-title">Latest Books</h2>
            <p class="section-subtitle">Browse our growing collection of books across all categories</p>
        </div>
        <div class="row g-4">
            @php $latestBooks = \App\Models\Book::latest()->take(4)->get(); @endphp
            @forelse($latestBooks as $book)
            <div class="col-md-3">
                <div class="book-preview-card">
                    <img src="{{ $book->cover_image ? $book->cover_image : 'https://via.placeholder.com/300x200/1a1a2e/f0c040?text='.urlencode($book->title) }}" alt="{{ $book->title }}">
                    <div class="book-preview-body">
                        <div class="book-category">{{ $book->category }}</div>
                        <h5>{{ $book->title }}</h5>
                        <p><i class="fas fa-user me-1"></i> {{ $book->author }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p style="color:#555;">No books added yet. <a href="/admin/create" style="color:#f0c040;">Add some books!</a></p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="/books" class="btn-hero-primary">
                <i class="fas fa-books me-2"></i>View All Books
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials">
    <div class="container">
        <div class="text-center">
            <div class="section-badge">Testimonials</div>
            <h2 class="section-title">What Our Users Say</h2>
            <p class="section-subtitle">Hear from students and researchers who use Osaro's Library</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Osaro's Library has completely changed how I study. I can find and download any book I need within minutes. The book request feature is absolutely amazing!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AO</div>
                        <div>
                            <div class="author-name">Adebayo Okonkwo</div>
                            <div class="author-role">Computer Science Student</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"I requested a rare engineering textbook and it was uploaded within 24 hours! The service is incredible and the interface is so clean and easy to use."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">FK</div>
                        <div>
                            <div class="author-name">Fatima Kabir</div>
                            <div class="author-role">Engineering Student</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card">
                    <div class="stars">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"As a researcher I need access to many books. Osaro's Library gives me everything in one place. The save feature helps me organize my reading list perfectly."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">CM</div>
                        <div>
                            <div class="author-name">Chidi Mensah</div>
                            <div class="author-role">PhD Researcher</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Request Section -->
<section class="request-section">
    <div class="container">
        <div class="request-card">
            <div class="section-badge mb-4">Book Requests</div>
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
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="footer-brand"><i class="fas fa-book-open me-2"></i>Osaro's Library</div>
                <p class="footer-desc">Your premium digital library for books, research papers and academic materials.</p>
            </div>
            <div class="col-md-2 mb-4">
                <div class="footer-links">
                    <h6>Library</h6>
                    <a href="/books">Browse Books</a>
                    <a href="/requests/create">Request Book</a>
                    <a href="/dashboard">Dashboard</a>
                </div>
            </div>
            <div class="col-md-2 mb-4">
                <div class="footer-links">
                    <h6>Account</h6>
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                    <a href="/requests">My Requests</a>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="footer-links">
                    <h6>Categories</h6>
                    <a href="/books">Fiction & Non-Fiction</a>
                    <a href="/books">Science & Technology</a>
                    <a href="/books">Law & Medicine</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>&copy; 2026 Osaro's Library. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p>Built with <i class="fas fa-heart" style="color:#f0c040;"></i> for knowledge seekers</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>