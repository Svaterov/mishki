<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailedSpecsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Для автомобилей
            $table->string('body_type')->nullable()->after('color');
            $table->string('transmission')->nullable()->after('body_type');
            $table->integer('mileage')->nullable()->after('transmission');
            $table->string('fuel_type')->nullable()->after('mileage');
            $table->integer('horsepower')->nullable()->after('fuel_type');
            $table->integer('seats')->nullable()->after('horsepower');
            $table->string('drive_type')->nullable()->after('seats');
            
            // Для мотоциклов
            $table->string('motorcycle_type')->nullable()->after('drive_type');
            $table->integer('displacement')->nullable()->after('motorcycle_type');
            $table->string('cooling')->nullable()->after('displacement');
            $table->string('brakes')->nullable()->after('cooling');
            $table->string('suspension')->nullable()->after('brakes');
            $table->decimal('weight', 8, 2)->nullable()->after('suspension');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'body_type', 'transmission', 'mileage', 'fuel_type', 
                'horsepower', 'seats', 'drive_type', 'motorcycle_type',
                'displacement', 'cooling', 'brakes', 'suspension', 'weight'
            ]);
        });
    }
}