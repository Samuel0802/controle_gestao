<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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



public function enviaComprovantePorEmail($id)
{
//;dd($id);

$buscaVenda = Venda::where('id', '=', $id)->first();
$produtoNome = $buscaVenda->produto->nome;//funcão do produto esta sendo utilizado no model produto
$clienteEmail = $buscaVenda->cliente->email;//funcão do cliente->email esta sendo utilizado no model cliente

$clienteNome = $buscaVenda->cliente->nome; //buscando apenas o nome do cliente

$sendMailData = [ //imprimir no email qual Produto e Cliente
  'produtoNome' => $produtoNome,
  'clienteNome' => $clienteNome,
];

Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData)); //to: para email do cliente 

Toastr::success('Email enviado com sucesso.');
return redirect()->route('vendas.index');
//dd($clienteEmail);
}




}
