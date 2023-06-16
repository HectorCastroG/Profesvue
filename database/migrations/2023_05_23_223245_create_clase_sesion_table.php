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
        Schema::create('clase_sesion', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('clase_id');
            $table->foreignId('sesion_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_sesion');
    }
};
