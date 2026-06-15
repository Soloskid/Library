<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book - Osaro's Library</title>
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
        }
        .page-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 700; }
        .page-subtitle { color: #666; margin-top: 8px; }
        .main-content { padding: 60px 0; }
        .form-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            padding: 40px;
        }
        .form-label { color: #888; font-size: 0.82rem; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; margin-bottom: 8px; }
        .form-control, .form-select {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 14px 16px;
            color: #fff;
            font-size: 0.95rem;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            background: rgba(240,192,64,0.03);
            border-color: rgba(240,192,64,0.3);
            box-shadow: 0 0 0 3px rgba(240,192,64,0.08);
            color: #fff;
        }
        .form-control::placeholder { color: #444; }
        .form-select option { background: #0d0d15; }
        textarea.form-control { resize: none; }
        .form-text { color: #444; font-size: 0.8rem; margin-top: 6px; }
        .btn-submit {
            background: #f0c040;
            color: #0a0a0f;
            font-weight: 700;
            padding: 14px;
            border-radius: 8px;
            border: none;
            font-size: 1rem;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-submit:hover { background: #d4a800; transform: translateY(-2px); box-shadow: 0 10px 25px rgba(240,192,64,0.2); }
        .btn-back {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.08);
            color: #666;
            font-weight: 500;
            padding: 14px;
            border-radius: 8px;
            font-size: 0.95rem;
            width: 100%;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }
        .btn-back:hover { border-color: rgba(255,255,255,0.2); color: #fff; }
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
                <li class="nav-item"><a class="nav-link" href="/books">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="/admin">Admin Panel</a></li>
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
        <div class="page-title">Add New Book</div>
        <div class="page-subtitle">Fill in the details to add a new book to the library</div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-card">

                    @if($errors->any())
                        <div class="alert-danger">
                            @foreach($errors->all() as $error)
                                <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="/admin/store" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Book Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter book title" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter author name" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select" required>
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

                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Enter book description" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                            <div class="form-text">Upload a cover image for the book (optional)</div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Book PDF Link</label>
                            <input type="text" name="file_path" class="form-control" placeholder="Paste Google Drive direct download link here">
                            <div class="form-text">Upload PDF to Google Drive → Make public → Convert link to: https://drive.google.com/uc?export=download&id=FILE_ID</div>
                        </div>

                        <div class="d-grid gap-3">
                            <button type="submit" class="btn-submit">
                                <i class="fas fa-save me-2"></i>Add Book to Library
                            </button>
                            <a href="/admin" class="btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Back to Admin Panel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6"><p>&copy; 2026 Osaro's Library. All rights reserved.</p></div>
            <div class="col-md-6 text-md-end"><p><a href="/">Home</a> &nbsp;|&nbsp; <a href="/admin">Admin Panel</a></p></div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>