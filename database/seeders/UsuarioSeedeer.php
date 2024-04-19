<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeedeer extends Seeder
{
    public function run(): void
    { 
         //Criação os dados da tabela teste
        User::create(
            [
                'name' => 'Samuel Souza',
                 'email' => 'samuelsouza0802@gmail.com',
                 'password' => Hash::make('senha123') //Pra não reconhecer a senha como string, colocando protegido
            ]
            );
    }
}
