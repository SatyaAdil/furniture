<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('contents', function (Blueprint $table) {
            $table->string('page_key', 50)->primary();
            $table->text('page_value');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('contents');
    }
};
