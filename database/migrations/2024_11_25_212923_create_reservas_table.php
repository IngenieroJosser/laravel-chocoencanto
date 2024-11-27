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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // Columna ID autoincremental
            $table->string('destino'); // Destino del tour
            $table->date('fecha_inicio'); // Fecha de inicio
            $table->date('fecha_fin'); // Fecha de fin
            $table->integer('numero_personas'); // Número de personas
            $table->string('tipo_tour'); // Tipo de tour
            $table->string('transporte'); // Transporte utilizado
            $table->string('hospedaje'); // Hospedaje seleccionado
            $table->string('alimentacion'); // Alimentación incluida
            $table->text('comentarios')->nullable(); // Comentarios adicionales
            $table->string('metodo_pago'); // Método de pago
            $table->foreignId('user_id')->constrained('users'); // Relación con la tabla users
            $table->timestamps(); // `created_at` y `updated_at`
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
};
