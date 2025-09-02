@extends('layouts.app')

@section('title', $product->title)
@section('content')
<div class="container">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products.' . ($product->type == 'car' ? 'cars' : 'motorcycles')) }}">
                {{ $product->type == 'car' ? 'Автомобили' : 'Мотоциклы' }}
            </a></li>
            <li class="breadcrumb-item active">{{ $product->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-{{ $product->type == 'car' ? 'car-front' : 'bicycle' }}" style="font-size: 8rem;"></i>
                    <div class="mt-3">
                        <span class="badge bg-{{ $product->type == 'car' ? 'primary' : 'success' }} fs-6">
                            {{ $product->type == 'car' ? 'АВТОМОБИЛЬ' : 'МОТОЦИКЛ' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->title }}</h1>
            <p class="h2 text-primary mb-4">{{ number_format($product->price, 0, ',', ' ') }} руб.</p>
            
            <!-- Кнопка оплаты -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">🛒 Оформить заказ</h5>
                    <form id="payment-form">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ваше имя</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg w-100">
                            💳 Забронировать за {{ number_format($product->price * 0.1, 0, ',', ' ') }} руб.
                        </button>
                        <p class="text-muted mt-2 small">* Предоплата 10%. Менеджер свяжется для подтверждения заказа</p>
                    </form>
                </div>
            </div>

            <!-- Основные характеристики -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">📋 Основные характеристики</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Бренд:</strong> {{ $product->brand }}</p>
                            <p><strong>Модель:</strong> {{ $product->model }}</p>
                            <p><strong>Год:</strong> {{ $product->year }}</p>
                            <p><strong>Двигатель:</strong> {{ $product->engine }}</p>
                        </div>
                        <div class="col-6">
                            <p><strong>Цвет:</strong> {{ $product->color }}</p>
                            <p><strong>Мощность:</strong> {{ $product->horsepower }} л.с.</p>
                            @if($product->mileage)
                            <p><strong>Пробег:</strong> {{ number_format($product->mileage, 0, ',', ' ') }} км</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Детальные характеристики -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">🔧 Детальные характеристики</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($product->type == 'car')
                        <div class="col-md-6">
                            <h6>🚗 Характеристики автомобиля</h6>
                            <p><strong>Тип кузова:</strong> {{ $product->body_type ?? 'Не указано' }}</p>
                            <p><strong>Коробка передач:</strong> {{ $product->transmission ?? 'Не указано' }}</p>
                            <p><strong>Топливо:</strong> {{ $product->fuel_type ?? 'Не указано' }}</p>
                            <p><strong>Привод:</strong> {{ $product->drive_type ?? 'Не указано' }}</p>
                            <p><strong>Количество мест:</strong> {{ $product->seats ?? 'Не указано' }}</p>
                        </div>
                        @else
                        <div class="col-md-6">
                            <h6>🏍️ Характеристики мотоцикла</h6>
                            <p><strong>Тип:</strong> {{ $product->motorcycle_type ?? 'Не указано' }}</p>
                            <p><strong>Объем двигателя:</strong> {{ $product->displacement ?? 'Не указано' }} cc</p>
                            <p><strong>Охлаждение:</strong> {{ $product->cooling ?? 'Не указано' }}</p>
                            <p><strong>Тормоза:</strong> {{ $product->brakes ?? 'Не указано' }}</p>
                            <p><strong>Подвеска:</strong> {{ $product->suspension ?? 'Не указано' }}</p>
                            <p><strong>Вес:</strong> {{ $product->weight ?? 'Не указано' }} кг</p>
                        </div>
                        @endif
                        
                        <div class="col-md-6">
                            <h6>📝 Описание</h6>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
    <div class="card">
        <div class="card-body text-center p-0">
            <img src="{{ $product->image_url }}" 
                 class="img-fluid rounded" 
                 alt="{{ $product->title }}"
                 style="max-height: 400px; width: 100%; object-fit: cover;"
                 onerror="this.src='{{ asset('storage/images/placeholder/vehicle.jpg') }}'">
            <div class="mt-3">
                <span class="badge bg-{{ $product->type == 'car' ? 'primary' : 'success' }} fs-6">
                    {{ $product->type == 'car' ? 'АВТОМОБИЛЬ' : 'МОТОЦИКЛ' }}
                </span>
            </div>
        </div>
    </div>
</div>

    <!-- Кнопки навигации -->
    <div class="mt-4 text-center">
        <a href="{{ route('products.' . ($product->type == 'car' ? 'cars' : 'motorcycles')) }}" 
           class="btn btn-secondary me-2">
            ← Назад к {{ $product->type == 'car' ? 'автомобилям' : 'мотоциклам' }}
        </a>
        <a href="{{ route('products.all') }}" class="btn btn-outline-primary me-2">Все товары</a>
        <a href="{{ route('home') }}" class="btn btn-outline-secondary">На главную</a>
    </div>
</div>

<!-- JavaScript для формы оплаты -->
<script>
document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = {
        name: document.getElementById('name').value,
        phone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        product_id: {{ $product->id }},
        product_name: '{{ $product->title }}',
        amount: {{ $product->price * 0.1 }}
    };
    
    // Здесь можно добавить отправку данных на сервер
    alert('Заявка принята! Менеджер свяжется с вами в течение 15 минут для подтверждения заказа.\n\nТовар: {{ $product->title }}\nПредоплата: ' + ({{ $product->price * 0.1 }}).toLocaleString('ru-RU') + ' руб.');
    
    // Очищаем форму
    this.reset();
});
</script>
@endsection

<img src="{{ asset('images/vehicles/' . $product->image) }}" 
     alt="{{ $product->title }}"
     style="width: 100%; height: 200px; object-fit: cover;"
     onerror="this.src='https://via.placeholder.com/400x300/007bff/ffffff?text=No+Image'">