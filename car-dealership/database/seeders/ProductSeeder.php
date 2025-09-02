<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // АВТОМОБИЛИ
            [
                'title' => 'Toyota Camry 2023',
                'description' => 'Комфортный седан для города и трассы.',
                'price' => 2500000,
                'type' => 'car',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2023,
                'engine' => '2.5L Hybrid',
                'color' => 'Черный',
                'image' => 'toyota-camry.jpg' // Просто имя файла
            ],
            [
                'title' => 'BMW X5 2022',
                'description' => 'Премиальный SUV с полным приводом.',
                'price' => 6500000,
                'type' => 'car',
                'brand' => 'BMW',
                'model' => 'X5',
                'year' => 2022,
                'engine' => '3.0L Turbo',
                'color' => 'Белый',
                'image' => 'bmw-x5.jpg'
            ],
            [
                'title' => 'Mercedes C-Class 2023',
                'description' => 'Элегантный бизнес-седан.',
                'price' => 4200000,
                'type' => 'car',
                'brand' => 'Mercedes',
                'model' => 'C-Class',
                'year' => 2023,
                'engine' => '2.0L Turbo',
                'color' => 'Серый',
                'image' => 'mercedes-c-class.jpg'
            ],
            [
                'title' => 'Audi Q7 2022',
                'description' => 'Просторный 7-местный SUV.',
                'price' => 5800000,
                'type' => 'car',
                'brand' => 'Audi',
                'model' => 'Q7',
                'year' => 2022,
                'engine' => '3.0L TDI',
                'color' => 'Черный',
                'image' => 'audi-q7.jpg'
            ],
            [
                'title' => 'Volkswagen Golf 2023',
                'description' => 'Компактный хэтчбек.',
                'price' => 1800000,
                'type' => 'car',
                'brand' => 'Volkswagen',
                'model' => 'Golf',
                'year' => 2023,
                'engine' => '1.5L TSI',
                'color' => 'Синий',
                'image' => 'vw-golf.jpg'
            ],
            [
                'title' => 'Hyundai Tucson 2023',
                'description' => 'Стильный кроссовер.',
                'price' => 2800000,
                'type' => 'car',
                'brand' => 'Hyundai',
                'model' => 'Tucson',
                'year' => 2023,
                'engine' => '1.6L Hybrid',
                'color' => 'Зеленый',
                'image' => 'hyundai-tucson.jpg'
            ],
            [
                'title' => 'Skoda Octavia 2023',
                'description' => 'Спортивный лифтбек.',
                'price' => 1900000,
                'type' => 'car',
                'brand' => 'Skoda',
                'model' => 'Octavia',
                'year' => 2023,
                'engine' => '2.0L TSI',
                'color' => 'Красный',
                'image' => 'skoda-octavia.jpg'
            ],

            // МОТОЦИКЛЫ
            [
                'title' => 'Honda CBR 600RR 2022',
                'description' => 'Спортивный мотоцикл для трека.',
                'price' => 800000,
                'type' => 'motorcycle',
                'brand' => 'Honda',
                'model' => 'CBR 600RR',
                'year' => 2022,
                'engine' => '599cc',
                'color' => 'Красный',
                'image' => 'honda-cbr.jpg'
            ],
            [
                'title' => 'Yamaha MT-07 2023',
                'description' => 'Naked bike для города.',
                'price' => 700000,
                'type' => 'motorcycle',
                'brand' => 'Yamaha',
                'model' => 'MT-07',
                'year' => 2023,
                'engine' => '689cc',
                'color' => 'Синий',
                'image' => 'yamaha-mt07.jpg'
            ],
            [
                'title' => 'Kawasaki Ninja 2023',
                'description' => 'Мощный спортивный мотоцикл.',
                'price' => 950000,
                'type' => 'motorcycle',
                'brand' => 'Kawasaki',
                'model' => 'Ninja',
                'year' => 2023,
                'engine' => '636cc',
                'color' => 'Зеленый',
                'image' => 'kawasaki-ninja.jpg'
            ],
            [
                'title' => 'Ducati Monster 2022',
                'description' => 'Итальянский naked bike.',
                'price' => 1200000,
                'type' => 'motorcycle',
                'brand' => 'Ducati',
                'model' => 'Monster',
                'year' => 2022,
                'engine' => '821cc',
                'color' => 'Красный',
                'image' => 'ducati-monster.jpg'
            ],
            [
                'title' => 'Harley-Davidson 2023',
                'description' => 'Американский круизер.',
                'price' => 850000,
                'type' => 'motorcycle',
                'brand' => 'Harley-Davidson',
                'model' => 'Street Bob',
                'year' => 2023,
                'engine' => '107ci',
                'color' => 'Черный',
                'image' => 'harley-davidson.jpg'
            ],
            [
                'title' => 'BMW R 1250 GS 2023',
                'description' => 'Туристический эндуро.',
                'price' => 1500000,
                'type' => 'motorcycle',
                'brand' => 'BMW',
                'model' => 'R 1250 GS',
                'year' => 2023,
                'engine' => '1254cc',
                'color' => 'Синий',
                'image' => 'bmw-gs.jpg'
            ],
            [
                'title' => 'Suzuki V-Strom 2023',
                'description' => 'Adventure мотоцикл.',
                'price' => 750000,
                'type' => 'motorcycle',
                'brand' => 'Suzuki',
                'model' => 'V-Strom',
                'year' => 2023,
                'engine' => '645cc',
                'color' => 'Желтый',
                'image' => ''
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}