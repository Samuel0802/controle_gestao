@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <Prog></Prog>Editar Usuário
    </h1>
</div>



    <form method="POST" action="{{route ('atualizar.usuario', $findUsuario->id)}}" class="row g-3">
        @csrf

       @method('PUT')

       <div class="col-md-6">
        <label class="form-label">Nome</label>


        {{-- validando no front o erro --}}
        <input type="text" name="name" value="{{isset($findUsuario->name) ? $findUsuario->name : old('name')}}" class="form-control @error('name') is-invalid @enderror" >
        
        @if ($errors->has('name'))

        <div class="invalid-feedback">{{$errors->first('name')}}</div>
            
        @endif
{{-- 
value="{{ old('nome')}} " = para não ocorrer perca de dados no formulario

--}}

    </div>
    
    <div class="col-md-6">
        <label class="form-label">Email</label>
         {{-- validando no front o erro --}}
        <input type="email" value="{{isset($findUsuario->email) ? $findUsuario->email : old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" >

        @if ($errors->has('email'))
        <div class="invalid-feedback">{{$errors->first('email')}}</div>
            
        @endif
    </div>

    <div class="col-md-6">
        <label class="form-label">Senha</label>
         {{-- validando no front o erro --}}
        <input type="password" value="{{isset($findUsuario->password) ? $findUsuario->password : old('password')}}" name="password" class="form-control @error('password') is-invalid @enderror" >

        @if ($errors->has('password'))
        <div class="invalid-feedback">{{$errors->first('password')}}</div>
            
        @endif
    </div>
     
   
    <div class="col-12">
        <button type="submit" class="btn btn-success">CADASTRAR</button>
    </div>
    </form>
@endsection
