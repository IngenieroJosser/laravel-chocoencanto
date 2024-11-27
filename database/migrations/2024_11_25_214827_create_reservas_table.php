<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id(); // Clave primaria autoincremental
            $table->string('destino', 255);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedInteger('numero_personas');
            $table->string('tipo_tour', 100);
            $table->string('transporte', 100);
            $table->string('hospedaje', 100);
            $table->string('alimentacion', 100);
            $table->text('comentarios')->nullable();
            $table->string('metodo_pago', 100);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserves');
    }
};
