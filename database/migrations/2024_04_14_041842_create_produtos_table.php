<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   //Up: é aquilo que vai subir para tabela, phpmyadmin
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            //nullable(); para campos obrigatorio no banco
            $table->string('nome');
            $table->decimal('valor',10,2);
            $table->timestamps();
        });
    }

//Down: Vai dropar se existe a tabela
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
