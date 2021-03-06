#!/usr/bin/env bash

# 初始化
composer install
cp ./.env.example /.env
php artisan key:generate
php artisan vendor:publish --provider="Encore\Admin\AdminServiceProvider"
php artisan migrate

php artisan storageinks