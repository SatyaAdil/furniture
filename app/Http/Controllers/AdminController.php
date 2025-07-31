<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category; // kalau pakai kategori
use App\Models\User;     // kalau pakai user

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_categories' => Category::count(),
            'total_users' => User::count(),
        ];

        $recent_products = Product::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_products'));
    }
}
