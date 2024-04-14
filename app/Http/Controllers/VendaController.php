<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    protected $venda; // Definindo a propriedade $produto

    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    //função pra pesquisar lista
    public function index(Request $request)
    {
        // dd($request);
        //all(); trazer todos os dados do banco

        $pesquisar = $request->input('pesquisar');
        // dd($pesquisar);
        $findVendas = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? ''); //search: é o que estamos pegando do input de pesquisar

        //getProdutosPesquisarIndex(); = função que foi criada no model produto

        return view('pages.vendas.paginacao', compact('findVendas')); //compact: manda os dados no meu front end
    }


  //função de create
  //cadastrarProduto esta pegando da class,'cadastrarProduto' na rota
  public function cadastrarVenda(FormRequestVenda $request ){ //Request porque vai receber de um formulario
   
     if($request->method() == "POST"){
        //criar os dados

        $produtoBd = $request->all(); //vai pegar tudo do meu form
        Venda::create($produtoBd); //E realizar o create
      
       // Toastr::success('Gravado com sucesso');
       Toastr::success('Dados atualizados com sucesso.');

        return redirect()->route('produto.index'); // ser renderizado na minha index
     }

      //senão mostrar os dados
     return view('pages.vendas.create');
  }



}
