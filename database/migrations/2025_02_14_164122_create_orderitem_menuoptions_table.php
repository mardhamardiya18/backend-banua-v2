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
        Schema::create('orderitem_menuoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderitem_id')->constrained('order_items')->cascadeOnDelete();
            $table->foreignId('menuoption_id')->constrained('menu_options')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitem_menuoptions');
    }
};
