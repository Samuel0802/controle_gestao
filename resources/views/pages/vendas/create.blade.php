@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <Prog></Prog>Criar Nova Venda
    </h1>
</div>



    <form method="POST" action="{{route ('cadastrar.venda')}}" class="row g-3">
        @csrf


        <div class="col-md-6">
            <label class="form-label">Numeração</label>


            {{-- validando no front o erro --}}
            <input type="text" name="numero_da_venda" value="{{$findNumeracao}}" class="form-control @error('numero_da_venda') is-invalid @enderror" readonly>
            
            @if ($errors->has('numero_da_venda'))

            <div class="invalid-feedback">{{$errors->first('numero_da_venda')}}</div>
                
            @endif
 {{-- 
    value="{{ old('nome')}} " = para não ocorrer perca de dados no formulario
    
    --}}
        </div>

        <div class="col-md-12">
            <label class="form-label">Produtos</label>
            <select class="form-select" name="produto_id">
                <option selected>Click para selecionar</option>

                @foreach ( $findProduto as $produto )
                <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach

              </select>
        </div>


        <div class="col-md-12">
            <label class="form-label">Clientes</label>
            <select class="form-select" name="produto_id">
                <option selected>Click para selecionar</option>

                @foreach ( $findCliente as $cliente )

                <option value="{{$cliente->id}}">{{$cliente->nome}}</option>

                @endforeach

              </select>
        </div>
       
        <div class="col-12">
            <button type="submit" class="btn btn-success">CADASTRAR</button>
        </div>
    </form>
@endsection
