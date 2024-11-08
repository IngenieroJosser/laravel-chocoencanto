<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->string('destino');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('numero_personas');
            $table->string('tipo_tour');
            $table->string('transporte')->nullable();
            $table->string('hospedaje')->nullable();
            $table->string('alimentacion')->nullable();
            $table->text('comentarios')->nullable();
            $table->string('metodo_pago');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
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
}
