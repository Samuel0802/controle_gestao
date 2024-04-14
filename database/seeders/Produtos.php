<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Produtos extends Seeder
{
   
    public function run(): void
    { 
         //Criação os dados da tabela teste
        Produto::create(
            [
                'nome' => 'Samuel Souza',
                 'valor' => '20.00'
            ]
            );
    }
}
