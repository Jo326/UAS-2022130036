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
        Schema::create('service', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
        $table->text('description');
        $table->decimal('total_price', 10, 2);
        $table->dateTime('service_date');
        $table->string('status', 50)->default('Pending');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
