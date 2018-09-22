Requirement for this project:
    "php": "^7.1.3",
    "laravel/framework": "5.7.*",

Laravel Setup :
    Install Composer

    on cmd :
    composer global require "laravel/installer"

    laravel new blogname

    php artisan serve
    or
    in browser http://localhost/laravel/magelaravel/public/


setup database in .env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=homested
    DB_USERNAME=homestead
    DB_PASSWORD=secret

php artisan make:auth
php artisan migrate

check if auth is working

create model , controller , migration
php artisan make:model Post -mc