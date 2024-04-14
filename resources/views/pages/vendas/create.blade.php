@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <Prog></Prog>Criar Novo Cliente
    </h1>
</div>



    <form method="POST" action="{{route ('cadastrar.cliente')}}" class="row g-3">
        @csrf


        <div class="col-md-6">
            <label class="form-label">Nome</label>


            {{-- validando no front o erro --}}
            <input type="text" name="nome" value="{{ old('nome')}} " class="form-control @error('nome') is-invalid @enderror" >
            
            @if ($errors->has('nome'))

            <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                
            @endif
 {{-- 
    value="{{ old('nome')}} " = para não ocorrer perca de dados no formulario
    
    --}}
         
        </div>
        <div class="col-md-6">
            <label class="form-label">E-mail</label>
             {{-- validando no front o erro --}}
            <input type="" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" >

            @if ($errors->has('email'))
            <div class="invalid-feedback">{{$errors->first('email')}}</div>
                
            @endif
        </div>

        {{-- INPUT ENDEREÇO --}}

        <div class="col-md-6">
            <label class="form-label">Endereço</label>
             {{-- validando no front o erro --}}
            <input type="" id="endereco" value="{{old('endereco')}}" name="endereco" class="form-control @error('endereco') is-invalid @enderror" >

            @if ($errors->has('endereco'))
            <div class="invalid-feedback">{{$errors->first('endereco')}}</div>
                
            @endif
        </div>

 {{-- INPUT LOGRADOURO --}}

        <div class="col-md-6">
            <label class="form-label">Logradouro</label>
             {{-- validando no front o erro --}}
            <input type="" id="logradouro" value="{{old('logradouro')}}" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror" >

            @if ($errors->has('logradouro'))
            <div class="invalid-feedback">{{$errors->first('logradouro')}}</div>
                
            @endif
        </div>

         {{-- INPUT CEP --}}
         
        <div class="col-md-6">
            <label class="form-label">Cep</label>
             {{-- validando no front o erro --}}
            <input type="" id="cep" value="{{old('cep')}}" name="cep" class="form-control @error('cep') is-invalid @enderror" >

            @if ($errors->has('cep'))
            <div class="invalid-feedback">{{$errors->first('cep')}}</div>
                
            @endif
        </div>

         {{-- INPUT BAIRRO --}}

        <div class="col-md-6">
            <label class="form-label">Bairro</label>
             {{-- validando no front o erro --}}
            <input type="" id="bairro" value="{{old('bairro')}}" name="bairro" class="form-control @error('bairro') is-invalid @enderror" >

            @if ($errors->has('bairro'))
            <div class="invalid-feedback">{{$errors->first('bairro')}}</div>
                
            @endif
        </div>
       
        <div class="col-12">
            <button type="submit" class="btn btn-success">CADASTRAR</button>
        </div>
    </form>
@endsection
