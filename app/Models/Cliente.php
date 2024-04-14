<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [ //Coloca no model tudo que criar na migrations
        'nome', 
        'email',
        'endereco',
        'logradouro',
        'cep',
        'bairro',
    ];

    public function getClientesPesquisarIndex(string $search = ''){

        $clientes = $this->where(function ($query) use ($search){

            if($search ){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");

                //LIKE: no input ter o preenchimento automatico 
                 
            }
        })->get();

        return $clientes;
    }
}
