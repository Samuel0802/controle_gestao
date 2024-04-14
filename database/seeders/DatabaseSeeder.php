<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
     //função pra fazer a chamada no seeder criado
    public function run(): void
    {
    $this->call([
        Produtos::class,
        ClientesSeeder::class,
        VendasSeeder::class
    ]);
    }
}
