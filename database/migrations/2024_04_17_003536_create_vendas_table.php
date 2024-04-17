<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_da_venda'); //integer: pegando numero inteiro
            $table->foreignId('produto_id')->constrained('produtos'); //pegando id da tabela produtos
            $table->foreignId('cliente_id')->constrained('clientes');//pegando id da tabela produtos
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};