# API - Dividas

* [Server Requirements](#server-requirements)

* [Pre-requisitos](#pre-requisitos)

* [Instalando](#instalando)

* [Front-End](#front-end)

* [Modelagem do Banco](#modelagem-do-banco)

## Server Requirements

[↑ Menu](#API---Dividas)

[Laravel Requirements](https://laravel.com/docs/7.x#server-requirements)

* PHP >= 7.2.5
* BCMath PHP Extension
* Ctype PHP Extension
* Fileinfo PHP extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

## Pre-requisitos

[↑ Menu](#API---Dividas)

1. PHP mínimo 7.2.5. Recomendo baixar [Laragon](https://laragon.org/download/index.html)

2. Composer. [Download](https://getcomposer.org/download/)

3. Verifique ambos estão registrados no PATH do Windows.

4. Talvez seja necessário reiniciar o Sistema Operacional.

## Instalando

[↑ Menu](#API---Dividas)

1. Faça um clone do projeto.

2. No terminal execute:

    `composer install`

3. Gerar uma key [terminal].

    `php artisan key:generate`

4. Crie um banco de dados sqlite [terminal].

    `touch database/database.sqlite`

5. Execute as migrations para criar as tabelas no banco e criar o usuário Admin.

    `php artisan migrate --seed`

6. Para visualizar a documentação da API, no terminal.

    `php artisan apidoc:generate`

    * Será criado um arquivo em `/public/docs/index.html`

    * Você pode importar o arquivo `/public/docs/collection.json` para o Postman, já com todas as requisições prontas.

7. Para executar o servidor [terminal].

    * Ao executar o projeto, alguns antivírus podem considerar como falso-positivo, e excluir o arquivo server.php do diretório raiz. Recomendo colocar o diretório na pasta de excessões.

        `php artisan serve`

## Front-End

[↑ Menu](#API---Dividas)

* Você pode visualizar o Front-End deste projeto no [link](https://github.com/angelorpt/dividas-clientes-vue)

## Modelagem do Banco

[↑ Menu](#API---Dividas)

![Modelagem](/_modelagem/Modelagem.png)
