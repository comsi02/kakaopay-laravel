<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Composer Install

Linux / Unix / Max OS X
- curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin/

Symbolic
- sudo ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

## Copy Laravel env file

- cp .env.example .env

## Laravel lib install

- composer install

## Create Lavavel app key

- php artisan key:generate

## Kakao_api_admin_key

- vi config/kakaopay.php
- properties -> kakao_api_admin_key

