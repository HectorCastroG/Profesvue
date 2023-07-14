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
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->text('title', 40);
            $table->text('body');
            $table->text('summary', 50)->nullable();
            $table->string('pkey1')->nullable();
            $table->string('pkey2')->nullable();
            $table->string('pkey3')->nullable();
            $table->foreignId('profesor_id');
            $table->foreignId('contenido_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
