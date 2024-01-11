<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reserveproducts', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->integer('product_id');
            $table->string('product_name');
            $table->string('details');
            $table->integer('quantity');
            $table->date('date');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reserveproducts');
    }
};
