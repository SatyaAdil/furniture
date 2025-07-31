<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Cek dulu kalau kolom id_category belum punya foreign key
            if (!Schema::hasColumn('products', 'id_category')) {
                // (opsional, jika ternyata belum ada)
                $table->unsignedBigInteger('id_category')->nullable()->after('in_stok');
            }

            // Tambahkan foreign key constraint
            $table->foreign('id_category')
                  ->references('id_category') // HARUS sesuai dengan kolom di tabel categories
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['id_category']);
            // Tidak perlu drop kolom jika sudah ada
        });
    }
};
