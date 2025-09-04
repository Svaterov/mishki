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
                <p class="text-muted">7 моделей в наличии</p>
                <p>Спортивные, круизеры и туреры</p>
                <a href="{{ route('products.motorcycles') }}" class="btn btn-primary">Смотреть все</a>
            </div>
        </div>
    </div>
</div>

@if(isset($products) && $products->count() > 0)
<h2 class="mb-4">Новые поступления</h2>

<!-- Автомобили - первый ряд -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">🚗 Автомобили</h4>
    </div>
    @foreach($products->where('type', 'car')->take(4) as $product)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                <i class="bi bi-car-front" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">
                    <strong>{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                </p>
                <p class="card-text">
                    <span class="badge bg-primary">Автомобиль</span>
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        {{ $product->brand }} • {{ $product->year }} год
                    </small>
                </p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">📋 Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Мотоциклы - второй ряд -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="mb-3">🏍️ Мотоциклы</h4>
    </div>
    @foreach($products->where('type', 'motorcycle')->take(4) as $product)
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100">
            <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                <i class="bi bi-bicycle" style="font-size: 3rem;"></i>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">
                    <strong>{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                </p>
                <p class="card-text">
                    <span class="badge bg-success">Мотоцикл</span>
                </p>
                <p class="card-text">
                    <small class="text-muted">
                        {{ $product->brand }} • {{ $product->year }} год
                    </small>
                </p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary w-100">📋 Подробнее</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Кнопки просмотра всех товаров -->
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="text-center">
            <a href="{{ route('products.cars') }}" class="btn btn-outline-primary">
                Смотреть все автомобили ({{ $products->where('type', 'car')->count() }})
            </a>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="text-center">
            <a href="{{ route('products.motorcycles') }}" class="btn btn-outline-primary">
                Смотреть все мотоциклы ({{ $products->where('type', 'motorcycle')->count() }})
            </a>
        </div>
    </div>
</div>
<div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center p-3">
    <img src="{{ $product->image_url }}" 
         class="img-fluid" 
         alt="{{ $product->title }}"
         style="height: 150px; width: 100%; object-fit: contain;"
         onerror="this.src='{{ asset('storage/images/placeholder/vehicle.jpg') }}'">
</div>
@else
<div class="alert alert-info">
    Пока нет товаров. Запустите сидер для добавления тестовых данных.
</div>
@endif
@endsection