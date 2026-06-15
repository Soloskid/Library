<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Requests - Osaro's Library</title>
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
        .table-section {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 16px;
            overflow: hidden;
        }
        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.05);
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
        .table tbody tr:hover { background: rgba(255,255,255,0.02); }
        .badge-pending {
            background: rgba(240,192,64,0.1);
            border: 1px solid rgba(240,192,64,0.2);
            color: #f0c040;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-fulfilled {
            background: rgba(40,167,69,0.1);
            border: 1px solid rgba(40,167,69,0.2);
            color: #5cb85c;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .btn-fulfill {
            background: rgba(40,167,69,0.1);
            border: 1px solid rgba(40,167,69,0.2);
            color: #5cb85c;
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-fulfill:hover { background: rgba(40,167,69,0.2); }
        .alert-success {
            background: rgba(40,167,69,0.1);
            border: 1px solid rgba(40,167,69,0.2);
            color: #5cb85c;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }
        .empty-row td { text-align: center; padding: 60px 20px !important; color: #333; }
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
                <li class="nav-item"><a class="nav-link active" href="/admin/requests" style="color:#f0c040 !important;">Requests</a></li>
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
        <div class="page-title">Book Requests</div>
        <div class="page-subtitle">Manage and fulfill user book requests</div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container">

        @if(session('success'))
            <div class="alert-success"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
        @endif

        <div class="table-section">
            <div class="table-header">
                <h5><i class="fas fa-list me-2" style="color:#f0c040;"></i>All Requests</h5>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Details</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requests as $request)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td style="color:#fff;">{{ $request->user->name }}</td>
                            <td style="color:#fff; font-weight:500;">{{ $request->book_title }}</td>
                            <td>{{ $request->author ?? 'N/A' }}</td>
                            <td>{{ $request->description ?? 'N/A' }}</td>
                            <td>
                                @if($request->status == 'pending')
                                    <span class="badge-pending"><i class="fas fa-clock me-1"></i>Pending</span>
                                @else
                                    <span class="badge-fulfilled"><i class="fas fa-check me-1"></i>Fulfilled</span>
                                @endif
                            </td>
                            <td>{{ $request->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($request->status == 'pending')
                                <form method="POST" action="/admin/requests/{{ $request->id }}/fulfill">
                                    @csrf
                                    <button class="btn-fulfill">
                                        <i class="fas fa-check me-1"></i>Fulfill
                                    </button>
                                </form>
                                @else
                                    <span style="color:#333; font-size:0.8rem;">Done</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row">
                            <td colspan="8">
                                <i class="fas fa-list fa-2x mb-3" style="display:block; color:#1a1a1a;"></i>
                                No book requests yet
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
            <div class="col-md-6 text-md-end"><p><a href="/">Home</a> &nbsp;|&nbsp; <a href="/admin">Admin Panel</a></p></div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>