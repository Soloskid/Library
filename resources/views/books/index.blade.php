<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Osaro's Library</title>
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
        .card-body {
            padding: 20px;
        }
        .search-section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .badge {
            font-size: 0.85rem;
            padding: 5px 10px;
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
        .btn-save {
            background-color: #f0c040;
            border: none;
            color: #1a1a2e;
            font-weight: bold;
        }
        .btn-save:hover {
            background-color: #d4a800;
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
                <li class="nav-item"><a class="nav-link active" href="/books">Books</a></li>
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
        <h1><i class="fas fa-books"></i> All Books</h1>
        <p class="mt-2" style="color:#ccc;">Browse and save books from our collection</p>
    </div>
</div>

<!-- Books Section -->
<div class="container">

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

    <!-- Search Bar -->
    <div class="search-section">
        <div class="row">
            <div class="col-md-8">
                <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Search books by title or author...">
            </div>
            <div class="col-md-4">
                <select id="categoryFilter" class="form-control form-control-lg">
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
                </select>
            </div>
        </div>
    </div>

    <div class="row" id="booksContainer">
        @forelse($books as $book)
        <div class="col-md-3 mb-4 book-card" data-title="{{ strtolower($book->title) }}" data-author="{{ strtolower($book->author) }}" data-category="{{ $book->category }}">
            <div class="card h-100">
                <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : 'https://via.placeholder.com/200x300?text=No+Cover' }}" class="card-img-top" alt="{{ $book->title }}">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $book->title }}</h5>
                    <p class="card-text text-muted"><i class="fas fa-user"></i> {{ $book->author }}</p>
                    <p class="card-text"><span class="badge bg-warning text-dark">{{ $book->category }}</span></p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="/books/{{ $book->id }}" class="btn btn-dark btn-sm">
                            <i class="fas fa-eye"></i> View
                        </a>
                        @auth
                        <form method="POST" action="/save/{{ $book->id }}">
                            @csrf
                            <button class="btn btn-save btn-sm">
                                <i class="fas fa-bookmark"></i> Save
                            </button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                <p class="text-muted fs-5">No books available yet.</p>
            </div>
        </div>
        @endforelse
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
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', filterBooks);
    document.getElementById('categoryFilter').addEventListener('change', filterBooks);

    function filterBooks() {
        const search = document.getElementById('searchInput').value.toLowerCase();
        const category = document.getElementById('categoryFilter').value.toLowerCase();
        const books = document.querySelectorAll('.book-card');

        books.forEach(book => {
            const title = book.getAttribute('data-title');
            const author = book.getAttribute('data-author');
            const bookCategory = book.getAttribute('data-category').toLowerCase();

            const matchesSearch = title.includes(search) || author.includes(search);
            const matchesCategory = category === '' || bookCategory === category;

            if (matchesSearch && matchesCategory) {
                book.style.display = 'block';
            } else {
                book.style.display = 'none';
            }
        });
    }
</script>
</body>
</html>