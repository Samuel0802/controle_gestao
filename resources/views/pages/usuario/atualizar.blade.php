@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <Prog></Prog>Editar Produto
    </h1>
</div>



    <form method="POST" action="{{route ('atualizar.produto', $findProduto->id)}}" class="row g-3">
        @csrf

       @method('PUT')

        <div class="col-md-6">
            <label class="form-label">Nome</label>


            {{-- validando no front o erro --}}
            <input type="text" name="nome" value="{{isset($findProduto->nome) ? $findProduto->nome : old('nome')}} " class="form-control @error('nome') is-invalid @enderror" >
            
            @if ($errors->has('nome'))

            <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                
            @endif
 {{-- 
    value="{{ old('nome')}} " = para não ocorrer perca de dados no formulario
    
    --}}

        </div>
        <div class="col-md-6">
            <label class="form-label">Valor</label>
             {{-- validando no front o erro --}}
            <input id="mascara_valor" type="" value="{{isset($findProduto->valor) ? $findProduto->valor : old('valor')}}" name="valor" class="form-control @error('valor') is-invalid @enderror" >

            @if ($errors->has('valor'))
            <div class="invalid-feedback">{{$errors->first('valor')}}</div>
                
            @endif
        </div>
         
       
        <div class="col-12">
            <button type="submit" class="btn btn-success">GRAVAR</button>
        </div>
    </form>
@endsection
