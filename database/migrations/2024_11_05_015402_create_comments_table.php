<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla users
            $table->text('comment'); // El comentario en sí
            $table->timestamps(); // Para created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
