<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        $request = []; //vai passa uma lista vazia
   
       if ($this->method() == "POST" || $this->method() == "PUT"){ //vem do controller produto
           $request = [
               //obs: precisa ser igual a migration da tabela
               'name' => 'required',
               'email' => 'required',
               'password' => 'required',
           ];
       } //SE FOR GET
   
       return $request;//vai retornar lista vazia
      
   }
}
