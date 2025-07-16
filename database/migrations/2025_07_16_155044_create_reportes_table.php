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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_codigo')->constrained('items', 'codigo');
            $table->integer('user_ci');
            $table->foreign('user_ci')->references('ci')->on('users');
            $table->foreignId('departamento_id')->constrained();
            $table->string('titulo');
            $table->text('contenido');
            $table->string('tipo')->nullable();
            $table->timestamp('fecha')->useCurrent();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
