@extends('layouts.app')

@section('title', 'Главная')
@section('content')
<div class="text-center mb-5">
    <h1 class="display-4">Добро пожаловать в наш автосалон!</h1>
    <p class="lead">Широкий выбор автомобилей и мотоциклов</p>
</div>

<div class="row mb-5">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <h3>🚗 Автомобили</h3>
                <p class="text-muted">7 моделей в наличии</p>
                <p>От эконом-класса до премиум сегмента</p>
                <a href="{{ route('products.cars') }}" class="btn btn-primary">Смотреть все</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body text-center">
                <h3>🏍️ Мотоциклы</h3>
                <p class="text-muted">9 моделей в наличии</p>
                <p>Спортивные, круизеры и туреры</p>
                <a href="{{ route('products.motorcycles') }}" class="btn btn-primary">Смотреть все</a>
            </div>
        </div>
    </div>
</div>

@if(isset($products) && $products->count() > 0)
<h2 class="mb-4">Новые поступления</h2>

<!-- Новые мотоциклы - специальный ряд -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">🔥 Новые мотоциклы</h4>
        <p class="text-muted">Свежие поступления этого месяца</p>
    </div>
    @foreach($products->where('type', 'motorcycle')->sortByDesc('created_at')->take(2) as $product)
    <div class="col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-header bg-success text-white">
                <span class="badge bg-warning">НОВИНКА</span>
            </div>
            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                <img src="/my-images/{{ $product->image }}" 
                     class="img-fluid" 
                     alt="{{ $product->title }}"
                     style="height: 200px; width: 100%; object-fit: cover;"
                     onerror="this.src='https://via.placeholder.com/400x300/28a745/ffffff?text={{ urlencode($product->title) }}'">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">
                    <strong class="text-success">{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                </p>
                <p class="card-text">
                    <span class="badge bg-success">Новое поступление</span>
                    <span class="badge bg-info">{{ $product->year }} год</span>
                </p>
                <p class="card-text">{{ Str::limit($product->description, 120) }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-success w-100">🚀 Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Автомобили - ряд -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">🚗 Автомобили</h4>
    </div>
    @foreach($products->where('type', 'car')->take(4) as $product)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                <img src="/my-images/{{ $product->image }}" 
                     class="img-fluid" 
                     alt="{{ $product->title }}"
                     style="height: 150px; width: 100%; object-fit: cover;"
                     onerror="this.src='https://via.placeholder.com/300x200/007bff/ffffff?text={{ urlencode($product->title) }}'">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">
                    <strong>{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                </p>
                <p class="card-text">
                    <span class="badge bg-primary">Автомобиль</span>
                </p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">📋 Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Мотоциклы - ряд -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">🏍️ Мотоциклы</h4>
    </div>
    @foreach($products->where('type', 'motorcycle')->where('created_at', '<', now()->subDays(3))->take(4) as $product)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                <img src="/my-images/{{ $product->image }}" 
                     class="img-fluid" 
                     alt="{{ $product->title }}"
                     style="height: 150px; width: 100%; object-fit: cover;"
                     onerror="this.src='https://via.placeholder.com/300x200/28a745/ffffff?text={{ urlencode($product->title) }}'">
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">
                    <strong>{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                </p>
                <p class="card-text">
                    <span class="badge bg-success">Мотоцикл</span>
                </p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">📋 Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@else
<div class="alert alert-info">
    Пока нет товаров. Запустите сидер для добавления тестовых данных.
</div>
@endif
@endsection