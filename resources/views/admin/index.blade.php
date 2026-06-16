<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Osaro's Library</title>
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
            padding: 80px 0;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            position: relative;
            overflow: hidden;
        }
        .page-header::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(240,192,64,0.05) 0%, transparent 70%);
            top: -200px;
            right: -100px;
        }
        .page-header .section-badge {
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
        .page-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .page-header p { color: #666; font-size: 1rem; }
        .search-section {
            background: #0d0d15;
            padding: 30px 0;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            position: sticky;
            top: 80px;
            z-index: 999;
        }
        .search-input {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 14px 20px;
            color: #fff;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s;
        }
        .search-input:focus {
            outline: none;
            border-color: rgba(240,192,64,0.3);
            background: rgba(240,192,64,0.02);
            box-shadow: 0 0 0 3px rgba(240,192,64,0.08);
        }
        .search-input::placeholder { color: #444; }
        .category-select {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 14px 20px;
            color: #fff;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s;
            cursor: pointer;
        }
        .category-select:focus {
            outline: none;
            border-color: rgba(240,192,64,0.3);
            box-shadow: 0 0 0 3px rgba(240,192,64,0.08);
        }
        .category-select option { background: #0d0d15; color: #fff; }
        .books-section { padding: 60px 0; }
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
        .book-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s;
        }
        .book-card:hover img { transform: scale(1.05); }
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
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }
        .book-title { font-weight: 600; font-size: 1rem; margin-bottom: 5px; }
        .book-author { color: #666; font-size: 0.85rem; margin-bottom: 15px; }
        .btn-view {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-view:hover { border-color: #f0c040; color: #f0c040; }
        .btn-save {
            background: rgba(240,192,64,0.1);
            border: 1px solid rgba(240,192,64,0.2);
            color: #f0c040;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-save:hover { background: rgba(240,192,64,0.2); }
        .empty-state { text-align: center; padding: 80px 0; }
        .empty-state i { font-size: 4rem; color: #222; margin-bottom: 20px; }
        .empty-state h4 { color: #444; margin-bottom: 10px; }
        .empty-state p { color: #333; }
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
                <li class="nav-item"><a class="nav-link active" href="/books" style="color:#f0c040 !important;">Books</a></li>
                @auth
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="/requests">Requests</a></li>
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

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="section-badge">Our Collection</div>
        <h1>Browse All Books</h1>
        <p>Discover and download books from our growing collection</p>
    </div>
</div>

<!-- Search -->
<div class="search-section">
    <div class="container">
        <div class="row g-3">
            <div class="col-md-8">
                <input type="text" id="searchInput" class="search-input" placeholder="Search by title or author...">
            </div>
            <div class="col-md-4">
                <select id="categoryFilter" class="category-select">
                    <option value="">All Categories</option>
                    <option value="Fiction">Fiction</option>
                    <option value="Non-Fiction">Non-Fiction</option>
                    <option value="Science">Science</option>
                    <option value="Technology">Technology</option>
                    <option value="History">History</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Law">Law</option>
                    <option value="Arts">Arts</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Business">Business</option>
                    <option value="Economics">Economics</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Finance">Finance</option>
                    <option value="Psychology">Psychology</option>
                    <option value="Education">Education</option>
                    <option value="Religion">Religion</option>
                    <option value="Agriculture">Agriculture</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Books -->
<div class="books-section">
    <div class="container">
        @if(session('success'))
            <div class="alert-success mb-4"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert-danger mb-4"><i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}</div>
        @endif

        <div class="row g-4" id="booksContainer">
            @forelse($books as $book)
            <div class="col-md-3 book-item" data-title="{{ strtolower($book->title) }}" data-author="{{ strtolower($book->author) }}" data-category="{{ $book->category }}">
                <div class="book-card">
                    <div style="overflow:hidden;">
                        <img src="{{ $book->cover_image ? $book->cover_image : 'https://via.placeholder.com/300x220/0d0d15/f0c040?text='.urlencode($book->title) }}" alt="{{ $book->title }}">
                    </div>
                    <div class="book-card-body">
                        <div class="book-category">{{ $book->category }}</div>
                        <div class="book-title">{{ $book->title }}</div>
                        <div class="book-author"><i class="fas fa-user me-1"></i>{{ $book->author }}</div>
                        <div class="d-flex gap-2">
                            <a href="/books/{{ $book->id }}" class="btn-view">
                                <i class="fas fa-eye me-1"></i>View
                            </a>
                            @auth
                            <form method="POST" action="/save/{{ $book->id }}">
                                @csrf
                                <button class="btn-save">
                                    <i class="fas fa-bookmark me-1"></i>Save
                                </button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="empty-state">
                    <i class="fas fa-book-open"></i>
                    <h4>No books available yet</h4>
                    <p>Check back soon or request a book</p>
                </div>
            </div>
            @endforelse
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
<script>
    document.getElementById('searchInput').addEventListener('keyup', filterBooks);
    document.getElementById('categoryFilter').addEventListener('change', filterBooks);

    function filterBooks() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const category = document.getElementById('categoryFilter').value.toLowerCase();
        const books = document.querySelectorAll('.book-item');

        books.forEach(book => {
            const title = book.getAttribute('data-title');
            const author = book.getAttribute('data-author');
            const bookCategory = book.getAttribute('data-category').toLowerCase();
            const matchesSearch = title.includes(search) || author.includes(search);
            const matchesCategory = category === '' || bookCategory === category;
            book.style.display = (matchesSearch && matchesCategory) ? 'block' : 'none';
        });
    }
</script>
</body>
</html>