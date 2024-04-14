<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


 //Comando no terminal;  php artisan make:request FormRequestProduto
  
    public function rules(): array
    {
         $request = []; //vai passa uma lista vazia

        if ($this->method() == "POST" || $this->method() == "PUT"){ //vem do controller produto
            $request = [
                'nome' => 'required', //obs: precisa ser igual a migration da tabela
                'valor' => 'required',
            ];
        } //SE FOR GET

        return $request;//vai retornar lista vazia
       
    }
}
