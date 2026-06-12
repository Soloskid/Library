<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request a Book - Osaro's Library</title>
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
        .btn-request {
            background: linear-gradient(135deg, #f0c040, #d4a800);
            border: none;
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px;
            border-radius: 8px;
            font-size: 1.1rem;
        }
        .btn-request:hover {
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
        .info-box {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
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
                <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link active" href="/requests">My Requests</a></li>
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
        <h1><i class="fas fa-hand-paper"></i> Request a Book</h1>
        <p class="mt-2" style="color:#ccc;">Can't find what you're looking for? Request it!</p>
    </div>
</div>

<!-- Form -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Info Box -->
            <div class="info-box">
                <h5><i class="fas fa-info-circle text-warning"></i> How it works</h5>
                <p class="mb-0">Submit your book request below and we will upload it to the library within <strong style="color:#f0c040;">24-48 hours</strong>. You will be able to find it in the books section once it's available.</p>
            </div>

            <div class="form-card">

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        @foreach($errors->all() as $error)
                            <p class="mb-0"><i class="fas fa-exclamation-circle"></i> {{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="/requests">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-book text-warning"></i> Book Title <span class="text-danger">*</span></label>
                        <input type="text" name="book_title" class="form-control" placeholder="Enter the book title" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-user text-warning"></i> Author (optional)</label>
                        <input type="text" name="author" class="form-control" placeholder="Enter the author name">
                    </div>

                    <div class="mb-4">
                        <label class="form-label"><i class="fas fa-align-left text-warning"></i> Additional Details (optional)</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Any additional details about the book..."></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-request">
                            <i class="fas fa-paper-plane"></i> Submit Request
                        </button>
                        <a href="/requests" class="btn btn-outline-dark">
                            <i class="fas fa-arrow-left"></i> Back to My Requests
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
        <a href="/books">Books</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>