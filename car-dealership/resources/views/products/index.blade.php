@extends('layouts.app')

@section('title', $title ?? 'Все товары')
@section('content')
<div class="container">
    <h1 class="mb-4">{{ $title ?? 'Все товары' }}</h1>

    <!-- Фильтры -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('products.all') }}" class="btn btn-outline-primary w-100 mb-2">
                                Все товары
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.cars') }}" class="btn btn-outline-primary w-100 mb-2">
                                🚗 Автомобили ({{ $products->where('type', 'car')->count() }})
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.motorcycles') }}" class="btn btn-outline-primary w-100 mb-2">
                                🏍️ Мотоциклы ({{ $products->where('type', 'motorcycle')->count() }})
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary w-100 mb-2">
                                На главную
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($products->count() > 0)
    <!-- Автомобили -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-3">🚗 Автомобили</h3>
        </div>
        @foreach($products->where('type', 'car') as $product)
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

    <!-- Мотоциклы -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="mb-3">🏍️ Мотоциклы</h3>
        </div>
        @foreach($products->where('type', 'motorcycle') as $product)
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
    <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center p-3">
    <img src="{{ $product->image_url }}" 
         class="img-fluid" 
         alt="{{ $product->title }}"
         style="height: 150px; width: 100%; object-fit: contain;"
         onerror="this.src='{{ asset('storage/images/placeholder/vehicle.jpg') }}'">
</div>

    <div class="mt-4 text-center">
        <p>Всего товаров: {{ $products->count() }} ({{ $products->where('type', 'car')->count() }} автомобилей, 
        {{ $products->where('type', 'motorcycle')->count() }} мотоциклов)</p>
    </div>
    @else
    <div class="alert alert-info text-center">
        <h4>Товаров пока нет</h4>
        <p>Запустите сидер для добавления тестовых данных:</p>
        <code>php artisan db:seed --class=ProductSeeder</code>
    </div>
    @endif
</div>
@endsection