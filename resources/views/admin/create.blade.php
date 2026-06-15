<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Osaro's Library</title>
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
        .form-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .form-label {
            font-weight: bold;
            color: #1a1a2e;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            border: 1px solid #ddd;
        }
        .form-control:focus {
            border-color: #f0c040;
            box-shadow: 0 0 0 0.2rem rgba(240,192,64,0.25);
        }
        .btn-add {
            background: linear-gradient(135deg, #f0c040, #d4a800);
            border: none;
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
        }
        .btn-add:hover {
            background: linear-gradient(135deg, #d4a800, #b38f00);
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
                <li class="nav-item"><a class="nav-link" href="/admin">Admin Panel</a></li>
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
        <h1><i class="fas fa-plus-circle"></i> Add New Book</h1>
        <p class="mt-2" style="color:#ccc;">Fill in the details to add a new book to the library</p>
    </div>
</div>

<!-- Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-card">

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        @foreach($errors->all() as $error)
                            <p class="mb-0"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="/admin/store" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-book text-warning"></i> Book Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter book title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user text-warning"></i> Author</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter author name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-tag text-warning"></i> Category</label>
                        <select name="category" class="form-control" required>
                            <option value="">Select Category</option>
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

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-align-left text-warning"></i> Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Enter book description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-image text-warning"></i> Cover Image</label>
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        <small class="text-muted">Upload a cover image for the book (optional)</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-file-pdf text-warning"></i> Book PDF Link</label>
                        <input type="text" name="file_path" class="form-control" placeholder="Paste Google Drive or any direct PDF link here">
                        <small class="text-muted">Upload your PDF to Google Drive, make it public, then paste the link here</small>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-add">
                            <i class="fas fa-save"></i> Add Book
                        </button>
                        <a href="/admin" class="btn btn-outline-dark">
                            <i class="fas fa-arrow-left"></i> Back to Admin Panel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2026 Osaro's Library. All rights reserved. |
        <a href="/">Home</a> |
        <a href="/admin">Admin Panel</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>