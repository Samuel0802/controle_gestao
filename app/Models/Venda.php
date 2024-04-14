<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [ //Coloca no model tudo que criar na migrations database
        'numero_da_venda', 
        'produto_id',
        'cliente_id',
        
    ];
  
    public function produto(){ //belongsTo: A venda depende de um produto
        return $this->belongsTo(Produto::class);
    }

    public function cliente(){//belongsTo: A venda depende de um Cliente
        return $this->belongsTo(Cliente::class);
    }

}
