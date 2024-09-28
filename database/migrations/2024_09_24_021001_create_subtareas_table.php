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
        Schema::create('subtareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tarea_id')->constrained()->onDelete('cascade');
            $table->string('titulo');
            $table->text('detalle');
            $table->string('estado');
            $table->date('vencimiento');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtareas');
    }
};
