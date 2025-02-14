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
        Schema::create('subproduct_menuoptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subproduct_id')->constrained('sub_products')->cascadeOnDelete();
            $table->foreignId('menuoption_id')->constrained('menu_options')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subproduct_menuoptions');
    }
};
