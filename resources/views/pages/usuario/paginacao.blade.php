{{-- extends referenciado a index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <Prog></Prog>Produtos
        </h1>
    </div>
    <div>
        <form action="{{route ('produto.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o Nome"/>
            <button>Pesquisar</button>

            <a type="button" href="{{route ('cadastrar.produto')}}" class="btn btn-success float-end">Incluir Produto</a>
        </form>

        
        <div class="table-responsive mt-4">

        {{-- Verificar lista vazia --}}

        @if ($findProduto->isEmpty())
         <p>Não existe dados </p>
         @else


       <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th >Valor</th>
                        <th >Ações</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- findproduto e produto estão sendo puxado do controller do produto --}}
                    @foreach ($findProduto as $produto) 
                    <tr>
                        {{-- produto e nome esta sendo pego do seeder produto --}}
                        <td>{{$produto->nome}}</td>

                        {{-- formatação de dinheiro --}}
                        <td>{{'R$' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td> 

                        <td>
                            <a href="{{route('atualizar.produto', $produto->id )}}" class="btn btn-light btn-sm">
                                Editar
                            </a>
                          
                            <meta name='csrf-token' content=" {{ csrf_token() }}" />
                            <a onclick="deleteRegistroPaginacao( '{{ route('produto.delete') }}', {{ $produto->id }})" class="btn btn-danger btn-sm">
                                Excluir
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
