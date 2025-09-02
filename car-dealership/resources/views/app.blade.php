<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .navbar-brand { font-weight: bold; font-size: 1.5rem; }
        .card { transition: transform 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .product-image { height: 200px; object-fit: cover; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🚗 Автосалон</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('home') }}">Главная</a>
                <a class="nav-link" href="{{ route('products.all') }}">Все товары</a>
                <a class="nav-link" href="{{ route('products.cars') }}">Автомобили</a>
                <a class="nav-link" href="{{ route('products.motorcycles') }}">Мотоциклы</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p>&copy; 2024 Автосалон. Все права защищены.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>