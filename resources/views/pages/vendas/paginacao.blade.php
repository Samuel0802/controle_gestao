{{-- extends referenciado a index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <Prog></Prog>Vendas
        </h1>
    </div>
    <div>
        <form action="{{route ('vendas.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o Nome"/>
            <button>Pesquisar</button>

            <a type="button" href="{{route ('cadastrar.venda')}}" class="btn btn-success float-end">Incluir Clientes</a>
        </form>

        
        <div class="table-responsive mt-4">

        {{-- Verificar lista vazia --}}

        @if ($findVendas->isEmpty())
         <p>Não existe dados </p>
         @else


       <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Númeração</th>
                        <th >Produto</th>
                        <th >Cliente</th>
                        <th >Ações</th>
            
                        
                    </tr>
                </thead>
                <tbody>

                    {{-- findproduto e produto estão sendo puxado do controller do produto --}}
                    @foreach ($findVendas as $venda) 
                    <tr>
                        {{-- produto e nome esta sendo pego do seeder produto --}}
                        <td>{{$venda->numero_da_venda}}</td>
                        {{-- Como é belongsTo: produto no db acessando nome dele --}}
                        <td>
                            @if ($venda->produto)
                                {{ $venda->produto->nome }}
                            @else
                                Produto não encontrado
                            @endif
                        </td>
                         {{-- Como é belongsTo: cliente no db acessando nome dele --}}
                         <td>
                            @if ($venda->cliente)
                                {{ $venda->cliente->nome }}
                            @else
                                Cliente não encontrado
                            @endif
                        </td>

                        <td>
                            <a href="{{route('enviaComprovantePorEmail.venda', $venda->id )}}" class="btn btn-light btn-sm">
                                Enviar Email
                            </a>
                          
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table> 
            @endif
        </div>
    </div>
@endsection
