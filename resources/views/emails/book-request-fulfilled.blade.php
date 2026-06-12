<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Request Fulfilled</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .email-header {
            background: linear-gradient(135deg, #1a1a2e, #0f3460);
            color: white;
            padding: 40px;
            text-align: center;
        }
        .email-header h1 {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
        }
        .email-header p {
            color: #ccc;
            margin: 10px 0 0;
        }
        .email-body {
            padding: 40px;
        }
        .email-body h2 {
            color: #1a1a2e;
            font-weight: bold;
        }
        .book-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
        }
        .book-details p {
            margin: 5px 0;
            color: #333;
        }
        .book-details strong {
            color: #1a1a2e;
        }
        .btn-visit {
            display: inline-block;
            background: linear-gradient(135deg, #f0c040, #d4a800);
            color: #1a1a2e;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
        }
        .email-footer {
            background: #1a1a2e;
            color: #ccc;
            text-align: center;
            padding: 20px;
            font-size: 0.9rem;
        }
        .email-footer a {
            color: #f0c040;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>📚 Osaro's Library</h1>
            <p>Your book request has been fulfilled!</p>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2>Hello {{ $bookRequest->user->name }}! 🎉</h2>
            <p>Great news! Your book request has been fulfilled and is now available in our library.</p>

            <div class="book-details">
                <p><strong>📖 Book Title:</strong> {{ $bookRequest->book_title }}</p>
                @if($bookRequest->author)
                <p><strong>✍️ Author:</strong> {{ $bookRequest->author }}</p>
                @endif
                <p><strong>✅ Status:</strong> Fulfilled</p>
            </div>

            <p>You can now find this book in our library. Visit the link below to browse and download it!</p>

            <a href="https://library-production-d62f.up.railway.app/books" class="btn-visit">
                Browse Books Now
            </a>

            <p style="margin-top:30px; color:#666;">Thank you for using Osaro's Library! 😊</p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <p>&copy; 2026 Osaro's Library. All rights reserved.</p>
            <p><a href="https://library-production-d62f.up.railway.app">Visit our Library</a></p>
        </div>
    </div>
</body>
</html>