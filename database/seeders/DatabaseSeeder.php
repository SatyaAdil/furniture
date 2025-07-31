<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Insert categories
        DB::table('categories')->insert([
            ['id_category' => 1, 'name_category' => 'Cabinets'],
            ['id_category' => 2, 'name_category' => 'Special Furniture'],
            ['id_category' => 3, 'name_category' => 'Shelves'],
            ['id_category' => 4, 'name_category' => 'Tables'],
            ['id_category' => 5, 'name_category' => 'Others / Multifunctional'],
        ]);

        // Insert contents
        DB::table('contents')->insert([
            [
                'page_key' => 'about_page',
                'page_value' => '... (isi HTML about_page panjang persis copy dari sql dump) ...'
            ],
            [
                'page_key' => 'footer_content',
                'page_value' => '... (isi HTML footer_content panjang persis copy dari sql dump) ...'
            ],
            [
                'page_key' => 'home_welcome',
                'page_value' => '... (isi HTML home_welcome panjang persis copy dari sql dump) ...'
            ],
            [
                'page_key' => 'service_page',
                'page_value' => '... (isi HTML service_page panjang persis copy dari sql dump) ...'
            ],
        ]);

        // Insert products
        DB::table('products')->insert([
            ['id' => 32, 'name_product' => 'Lemari Arsip ', 'image_url' => 'static/image/LemariArsip1.jpg', 'price' => 775000, 'category' => 1, 'in_stok' => 1],
            ['id' => 33, 'name_product' => 'Lemari Arsip ', 'image_url' => 'static/image/Oribinet3.jpg', 'price' => 765000, 'category' => 1, 'in_stok' => 4],
            ['id' => 44, 'name_product' => 'Set Kursi Tamu', 'image_url' => 'static/image/setkursitamu2.jpg', 'price' => 3712500, 'category' => 2, 'in_stok' => 3],
            ['id' => 45, 'name_product' => 'Set Kursi Tamu', 'image_url' => 'static/image/setkursitamu1.jpeg', 'price' => 3500000, 'category' => 2, 'in_stok' => 7],
            ['id' => 46, 'name_product' => 'KitchenSet ', 'image_url' => 'static/image/kitchenset1.jpg', 'price' => 2520000, 'category' => 2, 'in_stok' => 4],
            ['id' => 47, 'name_product' => 'KitchenSet', 'image_url' => 'static/image/kitchenset2.jpg', 'price' => 2600000, 'category' => 2, 'in_stok' => 9],
            ['id' => 48, 'name_product' => 'Set Meja Makan', 'image_url' => 'static/image/mejamakan1.jpg', 'price' => 3220000, 'category' => 2, 'in_stok' => 9],
            ['id' => 49, 'name_product' => 'Set Meja Makan', 'image_url' => 'static/image/mejamakan2.jpg', 'price' => 3100000, 'category' => 2, 'in_stok' => 2],
            ['id' => 50, 'name_product' => 'Meja TV', 'image_url' => 'static/image/MejaTV1.jpg', 'price' => 2669000, 'category' => 4, 'in_stok' => 3],
            ['id' => 51, 'name_product' => 'Meja TV', 'image_url' => 'static/image/MejaTV3.jpg', 'price' => 27500000, 'category' => 3, 'in_stok' => 5],
            ['id' => 52, 'name_product' => 'Rak Dinding', 'image_url' => 'static/image/RakDinding1.jpg', 'price' => 69500, 'category' => 3, 'in_stok' => 1],
            ['id' => 53, 'name_product' => 'Rak Dinding', 'image_url' => 'static/image/RakDinding3.jpg', 'price' => 75000, 'category' => 3, 'in_stok' => 1],
            ['id' => 54, 'name_product' => 'Meja Rias', 'image_url' => 'static/image/mejarias1.jpeg', 'price' => 2397000, 'category' => 5, 'in_stok' => 4],
            ['id' => 55, 'name_product' => 'Meja Rias', 'image_url' => 'static/image/mejarias2i.jpg', 'price' => 2490000, 'category' => 5, 'in_stok' => 1],
            ['id' => 56, 'name_product' => 'Lemari Pakaian', 'image_url' => 'static/image/LemariPakaian1.jpg', 'price' => 3500000, 'category' => 1, 'in_stok' => 2],
            ['id' => 57, 'name_product' => 'Lemari Pakaian', 'image_url' => 'static/image/LemariPakaian3.jpg', 'price' => 3550000, 'category' => 1, 'in_stok' => 6],
            ['id' => 58, 'name_product' => 'Lemari Pajangan', 'image_url' => 'static/image/LemariPajangan2.jpg', 'price' => 2350000, 'category' => 1, 'in_stok' => 7],
            ['id' => 59, 'name_product' => 'Lemari Pajangan', 'image_url' => 'static/image/LemariPajangan3.jpg', 'price' => 2455000, 'category' => 1, 'in_stok' => 8],
        ]);

        // Insert admin user
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
    }
}
