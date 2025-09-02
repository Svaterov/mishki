@extends('layouts.app')

@section('title', $title)
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.all') }}">Все товары</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>

    <h1 class="mb-4">{{ $title }}</h1>

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
                            <a href="{{ route('products.cars') }}" class="btn btn-{{ $title == 'Автомобили' ? 'primary' : 'outline-primary' }} w-100 mb-2">
                                🚗 Автомобили
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('products.motorcycles') }}" class="btn btn-{{ $title == 'Мотоциклы' ? 'primary' : 'outline-primary' }} w-100 mb-2">
                                🏍️ Мотоциклы
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
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100">
                <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                    <i class="bi bi-{{ $product->type == 'car' ? 'car-front' : 'bicycle' }}" style="font-size: 3rem;"></i>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">
                        <strong>{{ number_format($product->price, 0, ',', ' ') }} руб.</strong>
                    </p>
                    <p class="card-text">
                        <span class="badge bg-{{ $product->type == 'car' ? 'primary' : 'success' }}">
                            {{ $product->type == 'car' ? 'Автомобиль' : 'Мотоцикл' }}
                        </span>
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
        <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center p-3">
    <img src="{{ $product->image_url }}" 
         class="img-fluid" 
         alt="{{ $product->title }}"
         style="height: 150px; width: 100%; object-fit: contain;"
         onerror="this.src='{{ asset('storage/images/placeholder/vehicle.jpg') }}'">
</div>
        @endforeach
    </div>

    <div class="mt-4 text-center">
        <p>Найдено товаров: {{ $products->count() }}</p>
    </div>
    @else
    <div class="alert alert-info">
        В этой категории пока нет товаров.
    </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('products.all') }}" class="btn btn-secondary">← Все товары</a>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">На главную</a>
    </div>
</div>
@endsection