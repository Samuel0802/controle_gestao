<?php

namespace App\Http\Controllers;

use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $user; // Definindo a propriedade $produto

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //função pra pesquisar lista
    public function index(Request $request)
    {
        // dd($request);
        //all(); trazer todos os dados do banco

        $pesquisar = $request->input('pesquisar');
        // dd($pesquisar);
        $findUsuario = $this->user->getUsuariosPesquisarIndex(search: $pesquisar ?? ''); //search: é o que estamos pegando do input de pesquisar

        //getProdutosPesquisarIndex(); = função que foi criada no model produto

        return view('pages.produtos.paginacao', compact('findProduto')); //compact: manda os dados no meu front end
    }


    //função pra delete a lista
    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

  //função de create
  //cadastrarProduto esta pegando da class,'cadastrarProduto' na rota
  public function cadastrarProduto(Request $request ){ //Request porque vai receber de um formulario
   
     if($request->method() == "POST"){
        //criar os dados

        $produtoBd = $request->all(); //vai pegar tudo do meu form


        User::create($produtoBd); //E realizar o create
      
       // Toastr::success('Gravado com sucesso');
       Toastr::success('Dados atualizados com sucesso.');

        return redirect()->route('usuario.index'); // ser renderizado na minha index
     }

      //senão mostrar os dados
     return view('pages.usuario.create');
  }




  public function atualizarProduto(Request $request, $id ){ //Request porque vai receber de um formulario
  // dd($id);
    if($request->method() == "PUT"){

       //atualizar os dados

      $data = $request->all(); //vai pegar tudo do meu form
    
       $buscaRegistro = User::find($id);
       $buscaRegistro->update($data);

        Toastr::success('Dados atualizados com sucesso.');
        return redirect()->route('usuario.index'); // ser renderizado na minha index
    }

     //senão mostrar os dados
     $findUsuario = User::where('id', '=', $id)->first();
    return view('pages.usuario.atualizar', compact('findUsuario'));

    //compact('findUsuario')): esta plotando meus dados do back end no meu front end

 }
}
