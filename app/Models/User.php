<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsuariosPesquisarIndex(string $search = ''){

        $produto = $this->where(function ($query) use ($search){

            if($search ){
                $query->where('nome', $search);
                $query->orWhere('nome', 'LIKE', "%{$search}%");

                //LIKE: no input ter o preenchimento automatico 
                 
            }
        })->get();

        return $produto;
    }
}
