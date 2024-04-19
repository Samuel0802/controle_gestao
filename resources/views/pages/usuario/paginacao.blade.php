{{-- extends referenciado a index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <Prog></Prog>Cadastrar Usuário
        </h1>
    </div>
    <div>
        <form action="{{route ('usuario.index')}}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o Nome"/>
            <button>Pesquisar</button>

            <a type="button" href="{{route ('cadastrar.usuario')}}" class="btn btn-success float-end">Incluir Usuário</a>
        </form>

        
        <div class="table-responsive mt-4">

        {{-- Verificar lista vazia --}}

        @if ($findUsuario->isEmpty())
         <p>Não existe dados </p>
         @else


       <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th >Email</th>
                        <th >Ações</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- findproduto e produto estão sendo puxado do controller do produto --}}
                    @foreach ($findUsuario as $usuario) 
                    <tr>
                        {{-- produto e nome esta sendo pego do seeder produto --}}
                        <td>{{$usuario->nome}}</td>
                        <td>{{$usuario->email}}</td>

                        <td>
                            <a href="{{route('atualizar.usuario', $usuario->id )}}" class="btn btn-light btn-sm">
                                Editar
                            </a>
                          
                            <meta name='csrf-token' content=" {{ csrf_token() }}" />
                            <a onclick="deleteRegistroPaginacao( '{{ route('usuario.delete') }}', {{ $usuario->id }})" class="btn btn-danger btn-sm">
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
