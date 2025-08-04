<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seal_numbers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('numero_sello')->unique();
            $table->integer('user_ci');
            $table->foreign('user_ci')->references('ci')->on('users');
            $table->string('estado')->default('disponible');
            $table->timestamp('fecha')->useCurrent();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('seal_numbers');
    }
};
