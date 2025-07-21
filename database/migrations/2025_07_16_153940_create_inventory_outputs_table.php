<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_codigo')->constrained('items', 'codigo');
            $table->integer('cantidad');
            $table->integer('user_ci');
            $table->foreign('user_ci')->references('ci')->on('users');
            $table->foreignId('departamento_id')->constrained();
            $table->timestamp('fecha');
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('inventory_outputs');
    }
};
