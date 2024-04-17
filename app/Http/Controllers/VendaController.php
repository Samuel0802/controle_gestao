<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Produto;
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

  public function cadastrarVenda(FormRequestVenda $request )  {
    $findNumeracao = Venda::max('numero_da_venda') + 1;
    $findProduto =  Produto::all();
    $findCliente =  Cliente::all();

    if ($request->method() == "POST") {
        // cria os dados
        $data = $request->all();
        $data['numero_da_venda'] = $findNumeracao;
      //  dd($data);

        Venda::create($data);

        Toastr::success('Dados gravados com sucesso.');
        return redirect()->route('vendas.index');
    }
    // mostrar os dados

    return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
}




}
