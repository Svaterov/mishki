<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Главная страница
    public function index()
    {
        $products = Product::latest()->take(6)->get();
        return view('welcome', compact('products'));
    }

    // Все продукты
    public function allProducts()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Только автомобили
    public function cars()
    {
        $products = Product::cars()->get();
        return view('products.category', [
            'products' => $products,
            'title' => 'Автомобили',
            'type' => 'car'
        ]);
    }

    // Только мотоциклы
    public function motorcycles()
    {
        $products = Product::motorcycles()->get();
        return view('products.category', [
            'products' => $products,
            'title' => 'Мотоциклы',
            'type' => 'motorcycle'
        ]);
    }

    // Детальная страница продукта
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}