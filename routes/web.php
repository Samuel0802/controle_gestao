<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\VendaController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;



//ROTA DE DASHBORD
Route::prefix('dashbord')->group(function(){

    Route::get('/', [DashbordController::class,'index'])->name('dashbord.index');
});

//Rotas produtos

/*
prefix o que ser: http: localhost:8989/produtos/adicionar


tudo o que tiver dentro de prefix produto vai está dentro da url produtos

localhost:8989/produtos/create
localhost:8989/produtos/delete

*/

  //put: alterar dados
    //post: criar dados
    //get: visualizar dados

    //ROTA DE PRODUTOS
Route::prefix('produtos')->group(function(){

    Route::get('/', [ProdutosController::class,'index'])->name('produto.index');
    //CADASTRO DO PRODUTO
    Route::get('/cadastrarProduto', [ProdutosController::class,'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class,'cadastrarProduto'])->name('cadastrar.produto');
    // ATUALIZA UPDATE
    Route::get('/atualizarProduto/{id}', [ProdutosController::class,'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class,'atualizarProduto'])->name('atualizar.produto');

    Route::delete('/delete', [ProdutosController::class,'delete'])->name('produto.delete');
    

});

//ROTA DE CLIENTES
Route::prefix('clientes')->group(function(){

    Route::get('/', [ClientesController::class,'index'])->name('clientes.index');
    //CADASTRO DE CLIENTE
    Route::get('/cadastrarCliente', [ClientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class,'cadastrarCliente'])->name('cadastrar.cliente');
    // ATUALIZA UPDATE
    Route::get('/atualizarCliente/{id}', [ClientesController::class,'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class,'atualizarCliente'])->name('atualizar.cliente');

    Route::delete('/delete', [ClientesController::class,'delete'])->name('cliente.delete');
    

});

//ROTA DE VENDAS
Route::prefix('vendas')->group(function(){

    Route::get('/', [VendaController::class,'index'])->name('vendas.index');
    Route::get('/cadastrarCliente', [VendaController::class,'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarCliente', [VendaController::class,'cadastrarVenda'])->name('cadastrar.venda');
    Route::get('/enviaComprovantePorEmail/{id}', [VendaController::class,'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');

});

