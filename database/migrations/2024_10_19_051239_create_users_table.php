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

    //  Tabla de usuarios
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    // Tabla de reservas
    public function upReserves () {
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->string('destino');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('numero_personas');
            $table->string('tipo_tour');
            $table->boolean('transporte')->default(false);
            $table->boolean('hospedaje')->default(false);
            $table->boolean('alimentacion')->default(false);
            $table->text('comentarios')->nullable();
            $table->string('metodo_pago');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('reserves');
    }
};
