@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <Prog></Prog>Dashboard
    </h1>
</div>

<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Produto Cadastrado</h5>
          <p class="card-text">Total de produtos cadastrado no sistema</p>
          <a  class="btn btn-primary">{{ $totalDeProdutoCadastrado}}</a>
        </div>
      </div>
    </div>


    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Cliente Cadastrado</h5>
          <p class="card-text">Total de cliente cadastrado no sistema</p>
          <a  class="btn btn-primary">{{$totalDeClienteCadastrado}}</a>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Venda Cadastrado</h5>
          <p class="card-text">Total de venda cadastrada no sistema.</p>
          <a  class="btn btn-primary">{{$totalDeVendaCadastrado}}</a>
        </div>
      </div>
    </div>
    
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Usuarios Cadastrado</h5>
          <p class="card-text">Total de usuarios cadastrado no sistema.</p>
          <a  class="btn btn-primary">{{$totalDeUsuarioCadastrado}}</a>
        </div>
      </div>
    </div>
  </div>

@endsection