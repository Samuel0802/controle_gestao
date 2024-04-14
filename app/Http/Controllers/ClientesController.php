<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\clientes;
use Illuminate\Http\Request;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;

class ClientesController extends Controller
{
    protected $cliente; // Definindo a propriedade $cliente

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    //função pra pesquisar lista
    public function index(Request $request)
    {
        // dd($request);
        //all(); trazer todos os dados do banco

        $pesquisar = $request->input('pesquisar');
        // dd($pesquisar);
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? ''); //search: é o que estamos pegando do input de pesquisar

        //getProdutosPesquisarIndex(); = função que foi criada no model produto

        return view('pages.clientes.paginacao', compact('findCliente')); //compact: manda os dados no meu front end
    }


    //função pra delete a lista
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

  //função de create
  //cadastrarProduto esta pegando da class,'cadastrarProduto' na rota
  public function cadastrarCliente(FormRequestClientes $request ){ //Request porque vai receber de um formulario
   
     if($request->method() == "POST"){
        //criar os dados

        $data = $request->all(); //vai pegar tudo do meu form
       // dd($data);
        Cliente::create($data); //E realizar o create
      
       // Toastr::success('Gravado com sucesso');
       Toastr::success('Dados atualizados com sucesso.');

        return redirect()->route('clientes.index'); // ser renderizado na minha index
     }

      //senão mostrar os dados
     return view('pages.clientes.create');
  }




  public function atualizarCliente(Request $request, $id ){ //Request porque vai receber de um formulario
  // dd($id);
    if($request->method() == "PUT"){

       //atualizar os dados

     $produtoBd = $request->all(); //vai pegar tudo do meu form
    
       
       $buscaRegistro = Cliente::find($id);
       $buscaRegistro->update($produtoBd);

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('clientes.index'); // ser renderizado na minha index
    }

     //senão mostrar os dados
     $findCliente = Cliente::where('id', '=', $id)->first();
    return view('pages.clientes.atualizar', compact('findCliente'));

    //compact('findProduto')): esta plotando meus dados do back end no meu front end

 }
}
