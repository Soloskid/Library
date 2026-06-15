<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Osaro's Library</title>
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
        .page-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
        }
        .page-subtitle { color: #666; margin-top: 8px; }
        .stat-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 30px;
            transition: all 0.3s;
            text-align: center;
        }
        .stat-card:hover { border-color: rgba(240,192,64,0.15); transform: translateY(-3px); }
        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(240,192,64,0.08);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .stat-icon i { color: #f0c040; font-size: 1.3rem; }
        .stat-number { font-size: 2rem; font-weight: 700; margin-bottom: 5px; }
        .stat-label { color: #666; font-size: 0.85rem; }
        .btn-add {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }
        .btn-add:hover { background: #d4a800; color: #0a0a0f; transform: translateY(-2px); }
        .btn-requests {
            background: rgba(255,255,255,0.04);
            color: #fff;
            font-weight: 600;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
            font-size: 0.9rem;
            border: 1px solid rgba(255,255,255,0.08);
        }
        .btn-requests:hover { border-color: #f0c040; color: #f0c040; }
        .table-section {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
        }
        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .table-header h5 { font-weight: 600; margin: 0; }
        .table { margin: 0; }
        .table thead th {
            background: rgba(240,192,64,0.05);
            border-color: rgba(255,255,255,0.05);
            color: #888;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 15px 20px;
        }
        .table tbody td {
            border-color: rgba(255,255,255,0.04);
            padding: 15px 20px;
            vertical-align: middle;
            color: #ccc;
            font-size: 0.9rem;
        }
        .table tbody tr { transition: background 0.2s; }
        .table tbody tr:hover { background: rgba(255,255,255,0.02); }
        .book-thumb {
            width: 45px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid rgba(255,255,255,0.08);
        }
        .book-category-badge {
            display: inline-block;
            background: rgba(240,192,64,0.08);
            border: 1px solid rgba(240,192,64,0.15);
            color: #f0c040;
            padding: 3px 10px;
            border-radius: 4px;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .btn-view-sm {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-view-sm:hover { border-color: #f0c040; color: #f0c040; }
        .btn-delete-sm {
            background: rgba(220,53,69,0.08);
            border: 1px solid rgba(220,53,69,0.2);
            color: #ff6b7a;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            transition: all 0.3s;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .btn-delete-sm:hover { background: rgba(220,53,69,0.15); }
        .empty-row td { text-align: center; padding: 60px 20px !important; color: #333; }
        .alert-success {
            background: rgba(40,167,69,0.1);
            border: 1px solid rgba(40,167,69,0.2);
            color: #5cb85c;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .main-content { padding: 60px 0; }
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
                <li class="nav-item"><a class="nav-link active" href="/admin" style="color:#f0c040 !important;">Admin</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/requests">Requests</a></li>
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
                <div class="page-title">Admin Panel</div>
                <div class="page-subtitle">Manage your library books and user requests</div>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0 d-flex gap-3 justify-content-md-end">
                <a href="/admin/requests" class="btn-requests">
                    <i class="fas fa-list"></i> Requests
                </a>
                <a href="/admin/create" class="btn-add">
                    <i class="fas fa-plus"></i> Add Book
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
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-books"></i></div>
                    <div class="stat-number">{{ $books->count() }}</div>
                    <div class="stat-label">Total Books</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-plus"></i></div>
                    <a href="/admin/create" class="btn-add mt-2" style="margin: 0 auto; display:inline-flex;">
                        <i class="fas fa-plus"></i> Add New Book
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-list"></i></div>
                    <a href="/admin/requests" class="btn-requests mt-2" style="margin: 0 auto; display:inline-flex;">
                        <i class="fas fa-list"></i> View Requests
                    </a>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
        @endif

        <!-- Books Table -->
        <div class="table-section">
            <div class="table-header">
                <h5><i class="fas fa-list me-2" style="color:#f0c040;"></i>All Books</h5>
                <a href="/admin/create" class="btn-add">
                    <i class="fas fa-plus"></i> Add Book
                </a>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $book->cover_image ? $book->cover_image : 'https://via.placeholder.com/45x60/0d0d15/f0c040?text=N' }}" class="book-thumb" alt="{{ $book->title }}">
                            </td>
                            <td style="color:#fff; font-weight:500;">{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td><span class="book-category-badge">{{ $book->category }}</span></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="/books/{{ $book->id }}" class="btn-view-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <form method="POST" action="/admin/{{ $book->id }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-delete-sm" onclick="return confirm('Delete this book?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row">
                            <td colspan="6">
                                <i class="fas fa-book-open fa-2x mb-3" style="display:block; color:#1a1a1a;"></i>
                                No books added yet
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
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