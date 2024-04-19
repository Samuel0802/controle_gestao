<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index(){
  
        $totalDeProdutoCadastrado = $this->buscarTotalProdutoCadastrado(); //Uma variavel que vai receber uma função
        $totalDeClienteCadastrado = $this->buscarTotalClienteCadastrado();
        $totalDeVendaCadastrado = $this->buscarTotalVendaCadastrado();
        $totalDeUsuarioCadastrado = $this->buscarTotalUsuarioCadastrado();


        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado','totalDeClienteCadastrado','totalDeVendaCadastrado','totalDeUsuarioCadastrado')); //retornando a view
    }

    public function buscarTotalProdutoCadastrado(){
      $findProduto = Produto::all()->count(); //Função que vai realizar a contagem de quantos tem!
                                              //acessando o banco Produto

       return $findProduto;
    }

    public function buscarTotalClienteCadastrado(){
        $find = Cliente::all()->count(); //Vai realizar a contagem de todos os clientes

        return $find;  
    }


    public function buscarTotalVendaCadastrado(){
        $find = Venda::all()->count(); //Contagem de vendas

        return $find; 
    }

    
    public function buscarTotalUsuarioCadastrado(){
        $find = User::all()->count(); //Contagem de vendas

        return $find; 
    }
}
