<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    
    public function run(): void
    { 
         //Criação os dados da tabela teste
        Cliente::create(
            [
                'nome' => 'Samuel Souza',
                 'email' => 'samuel@gmail.com',
                 'endereco' => 'Rua uirapuru',
                 'logradouro' => 'Casa',
                 'cep' => '69083000',
                 'bairro' => 'coroado',
            ]
            );

            Cliente::create(
                [
                    'nome' => 'Sabrina Medonça',
                     'email' => 'sabrina@gmail.com',
                     'endereco' => 'Rua uirapuru',
                     'logradouro' => 'Casa',
                     'cep' => '69083000',
                     'bairro' => 'coroado',
                ]
                );
    }
}
