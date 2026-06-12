<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Osaro's Library</title>
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
        .table-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .table th {
            background-color: #1a1a2e;
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
                <li class="nav-item"><a class="nav-link active" href="/admin">Admin Panel</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin/requests">Book Requests</a></li>
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
        <h1><i class="fas fa-cogs"></i> Admin Panel</h1>
        <p class="mt-2" style="color:#ccc;">Manage your library books and users</p>
    </div>
</div>

<!-- Stats -->
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-books"></i></div>
                <div class="stats-number">{{ $books->count() }}</div>
                <p class="text-muted">Total Books</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-plus-circle"></i></div>
                <a href="/admin/create" class="btn btn-warning btn-lg mt-2">
                    <i class="fas fa-plus"></i> Add New Book
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-icon"><i class="fas fa-list"></i></div>
                <a href="/admin/requests" class="btn btn-dark btn-lg mt-2">
                    <i class="fas fa-list"></i> View Requests
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

    <!-- Books Table -->
    <div class="table-card">
        <h4 class="fw-bold mb-4"><i class="fas fa-list"></i> All Books</h4>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
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
                            <img src="{{ $book->cover_image ? asset('storage/'.$book->cover_image) : 'https://via.placeholder.com/50x70?text=No+Cover' }}" width="50" height="70" style="object-fit:cover; border-radius:5px;">
                        </td>
                        <td class="fw-bold">{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td><span class="badge bg-warning text-dark">{{ $book->category }}</span></td>
                        <td>
                            <a href="/books/{{ $book->id }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <form method="POST" action="/admin/{{ $book->id }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this book?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-book-open fa-2x mb-2"></i>
                            <p>No books added yet.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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