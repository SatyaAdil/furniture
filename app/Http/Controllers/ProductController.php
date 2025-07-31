<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get(); // menampilkan semua produk
        return view('product', compact('products'));
    }

   public function create()
    {
        $kategori = Category::all(); // pastikan model Category sudah ada
        $produk = Product::with('category')->get(); // pastikan relasi tersedia
        return view('admin.add_product', compact('kategori', 'produk'));
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('admin.product.create')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus!');
    }

    public function edit($id)
    {
        $produk = Product::findOrFail($id);
        $kategori = Category::all();
        return view('admin.edit_product', compact('produk', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $produk->update([
            'name_product' => $request->input('name_product'),
            'image_url' => $request->input('image_url'),
            'price' => $request->input('price'),
            'in_stok' => $request->input('in_stok'),
            'id_category' => $request->input('id_category'),
        ]);

        return redirect()->route('admin.product.create')->with('success', 'Produk berhasil diupdate!');
    }

}
