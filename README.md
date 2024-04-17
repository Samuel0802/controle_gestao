
# Laravel 10 e PHP 8.1

### Passo a passo

### Crie o Arquivo .env

```sh
cp .env.example .env
```

### Gere a key do projeto Laravel

```sh
php artisan key:generate
```

### Validação de formulario
```sh
php artisan make:request FormRequestProduto
```

### criar controller

```sh
php artisan make:controller

```
### Rodar projeto

```sh
php artisan serve
```

### criar model + migration database

```sh
php artisan make:model NomeDoControlller -m
```

### apos criar os campos na migration
```sh
php artisan migrate
```

### Criar dados falsos seeder
```sh
php artisan make:seeder NomeDaSeeder
```

### subir os seeder para banco
```sh
php artisan db:seed
```


### Limpando o banco
```sh
php artisan migrate:refresh
 ```

/-------------------------------------------------

brian2694/laravel-toastr

```sh
https://github.com/brian2694/laravel-toastr
```

```sh
composer require brian2694/laravel-toastr
```

config/app.php

```sh
Brian2694\Toastr\ToastrServiceProvider::class,
```

/-----------------------------------------------------

### Etapa para envio de email

Gerar uma senha de App 

link: https://myaccount.google.com/u/1/apppasswords?pli=1&rapt=AEjHL4MyiBnfXlsLC-sGsFI2qxvpS8vV9uikivxJBm_pWBHGZ_pvr2Fd3ivlitYgWYnF7no_Hu2A7hFiglvpkdRk8XRC_f5vB6t512-BzynxmY09NdkUeog

 ### função para envio de email

```sh
 php artisan make:mail ComprovanteDeVendaEmail
 ```
### Criar um view do layout do email

 ### Criar as rotas e buscar email do cliente

 ### Criando a função send no controle

 ### realizar o envio de email




/-------------------------------------------------


CODIGOS LARAVEL 10

 {{-- content renderizar tudo o que eu  quero renderizar --}}

 ```sh
 @yield('content')
``` 
 {{--criação de componetes --}}

 OBS: precisa criar uma pasta componetes dentro de view

 ```sh
 @include('componetes.navegacao')  
``` 
{{-- yield: fazer importação dos css --}}

```sh
@yield('styles') 
``` 
 {{-- yield: fazer importação dos js --}}
 
 ```sh
@yield('script') 
``` 

EXTRA

https://bitbucket.org/

https://remixicon.com/

https://codeseven.github.io/toastr/demo.html

https://github.com/brian2694/laravel-toastr


/----------------------------------------------------

### quanado for subir projeto

git pull --rebase origin develop : puxar a branches sem afetar as alteração

php artisan make:model Flight --all

git push: jogar as alteração no git

//pegando a versão anterior git checkout 48a5768cdd2fa75ab65a588b7999ba969ca317c3