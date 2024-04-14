<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestClientes extends FormRequest
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
                'nome' => 'required', //obs: precisa ser igual a migration da tabela
                
            ];
        } //SE FOR GET

        return $request;//vai retornar lista vazia
       
    }
}
