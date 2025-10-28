<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repository CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e0e0e0;
        }

        .navbar-brand {
            color: #333 !important;
            font-weight: 600;
        }

        .card {
            border: 1px solid #eaeaea;
            border-radius: 12px;
        }

        .btn-primary,
        .btn-warning,
        .btn-danger {
            border-radius: 6px;
        }

        .table> :not(caption)>*>* {
            background-color: #fff !important;
        }
    </style>
</head>

<body>
    <nav class="navbar mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">📘 Repository CRUD</a>
        </div>
    </nav>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
