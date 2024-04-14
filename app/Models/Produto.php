<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [ //Coloca no model tudo que criar na migrations
        'nome', 
        'valor',
    ];

    public function getProdutosPesquisarIndex(string $search = ''){

        $produto = $this->where(function ($query) use ($search){

            if($search ){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");

                //LIKE: no input ter o preenchimento automatico 
                 
            }
        })->get();

        return $produto;
    }
}
