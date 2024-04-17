<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    public function run(): void
    {
        // Criação dos dados da tabela de vendas
        Venda::create([
            'numero_da_venda' => 1,
            'produto_id' => 3,// produto do id 4
            'cliente_id' =>1, //cliente do id 2
        ]);

        Venda::create([
            'numero_da_venda' => 2,
            'produto_id' => 1,// produto do id 8 
            'cliente_id' => 2,//cliente do id 3
        ]);
    }
}
