<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автосалон - @yield('title', 'Главная')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .navbar-brand { 
            font-weight: bold; 
            font-size: 1.5rem; 
        }
        .card { 
            transition: transform 0.3s; 
            margin-bottom: 20px;
        }
        .card:hover { 
            transform: translateY(-5px); 
        }
        .product-image { 
            height: 200px; 
            object-fit: cover; 
            width: 100%;
        }
        footer {
            margin-top: 50px;
        }
        .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 20px;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.product-image {
    height: 200px;
    object-fit: cover;
    width: 100%;
    border-bottom: 1px solid #eee;
}
.btn {
    transition: all 0.3s ease;
}
    </style>
</head>
<body>
    <!-- Навигация -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">🚗 Автосалон</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Главная</a>
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ route('products.all') }}">Все товары</a>
                    <a class="nav-link {{ request()->is('products/cars') ? 'active' : '' }}" href="{{ route('products.cars') }}">Автомобили</a>
                    <a class="nav-link {{ request()->is('products/motorcycles') ? 'active' : '' }}" href="{{ route('products.motorcycles') }}">Мотоциклы</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Основное содержимое -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Футер -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="container">
            <p>&copy; 2024 Автосалон. Все права защищены.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
