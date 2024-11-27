<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('produk', function (Blueprint $table) {
        $table->id();
        $table->string('name', 255);
        $table->string('category', 100);
        $table->decimal('price', 10, 2);
        $table->integer('stock')->default(0);
        $table->text('description')->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
