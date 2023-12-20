<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->integer('quantity');
            $table->string('product_name');
            $table->string('status');
            $table->date('delivery_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('delivery');
    }
};
