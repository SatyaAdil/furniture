<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $home_content = PageContent::where('page_name', 'home')->first();
        $service_content = PageContent::where('page_name', 'service')->first();
        $produk = Product::latest()->take(4)->get(); 

        return view('home', compact('home_content', 'service_content', 'produk'));
    }

    public function produk()
    {
        $products = Product::all(); // Ganti variabel jadi $products
        return view('product', compact('products')); // Kirim ke view dengan nama $products
    }


    public function detail($id)
    {
        $detail = Product::findOrFail($id); // Produk utama
        $produk = Product::where('id', '!=', $id)->inRandomOrder()->limit(4)->get(); // Rekomendasi produk

        return view('detail_product', compact('detail', 'produk'));
    }

}
