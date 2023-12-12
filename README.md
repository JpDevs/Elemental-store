<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Elemental Store v1.0
Deixo nesse repositório meu eterno agradecimento ao meu querido amigo [William Pereira](https://github.com/BrouWilliam). Irmão, olhe por nós daí do céu. Todos sentimos muito a sua falta aqui no plano terrestre.

Projeto desenvolvido em 2022 para a venda de VIPS e Veiculos no servidor Elemental Roleplay (Five-m)

Para instalar o projeto é simples, primeiramente clone o repositório `git clone https://github.com/JpDevs/Elemental-store`

Instale as dependências `composer install`

Crie um banco de dados

Copie e modifique o .env `cp .env.example .env` `nano .env`

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=suadb
DB_USERNAME=root
DB_PASSWORD=suasenha

STRIPE_SECRET=sua key stripe
STRIPE_KEY=sua key stripe
```

Após isso, rode o comando `php artisan migrate:fresh` para rodar as migrations e criar as tabelas.

Realizado o passo anterior, só basta rodar `php artisan serve` e sua aplicação estará disponível em `localhost:8000`


