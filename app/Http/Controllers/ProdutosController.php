<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    protected $produto; // Definindo a propriedade $produto

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    //função pra pesquisar lista
    public function index(Request $request)
    {
        // dd($request);
        //all(); trazer todos os dados do banco

        $pesquisar = $request->input('pesquisar');
        // dd($pesquisar);
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? ''); //search: é o que estamos pegando do input de pesquisar

        //getProdutosPesquisarIndex(); = função que foi criada no model produto

        return view('pages.produtos.paginacao', compact('findProduto')); //compact: manda os dados no meu front end
    }


    //função pra delete a lista
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

  //função de create
  //cadastrarProduto esta pegando da class,'cadastrarProduto' na rota
  public function cadastrarProduto(FormRequestProduto $request ){ //Request porque vai receber de um formulario
   
     if($request->method() == "POST"){
        //criar os dados

        $produtoBd = $request->all(); //vai pegar tudo do meu form

        $componetes = new Componentes(); //esta buscando do model Componentes do inputmask
        
        $produtoBd['valor'] = $componetes->formatacaoMascaraDinheiroDecimal($produtoBd['valor']);//tratamento de tirar virgula a manda como ponto no meu banco de dados
        //formatação de virgula para ponto no banco de dados
        

        Produto::create($produtoBd); //E realizar o create
      
       // Toastr::success('Gravado com sucesso');
       Toastr::success('Dados atualizados com sucesso.');

        return redirect()->route('produto.index'); // ser renderizado na minha index
     }

      //senão mostrar os dados
     return view('pages.produtos.create');
  }




  public function atualizarProduto(FormRequestProduto $request, $id ){ //Request porque vai receber de um formulario
  // dd($id);
    if($request->method() == "PUT"){

       //atualizar os dados

      $data = $request->all(); //vai pegar tudo do meu form
      $componetes = new Componentes(); //esta buscando do model Componentes do inputmask
      $data['valor'] = $componetes->formatacaoMascaraDinheiroDecimal($data['valor']);//tratamento de tirar virgula a manda como ponto no meu banco de dados
     //formatação de virgula para ponto no banco de dados
       
       $buscaRegistro = Produto::find($id);
       $buscaRegistro->update($data);

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('produto.index'); // ser renderizado na minha index
    }

     //senão mostrar os dados
     $findProduto = Produto::where('id', '=', $id)->first();
    return view('pages.produtos.atualizar', compact('findProduto'));

    //compact('findProduto')): esta plotando meus dados do back end no meu front end

 }
}
