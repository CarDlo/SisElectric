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
        Schema::create('doc_personals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo'); // Nombre original del archivo
            $table->string('ruta_archivo'); // Ruta donde se almacena el archivo
            $table->string('tipo_archivo', 100); // Tipo MIME del archivo
            $table->bigInteger('tamaño_archivo'); // Tamaño del archivo en bytes
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('log_id');
            $table->foreign('log_id')->references('id')->on('logempleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_personals');
    }
};
