# Mage Workshop Laravel Tutorial : 

Requirement for this project:

     "php": "^7.1.3",
     "laravel/framework": "5.7.*",

Laravel Setup :

    Install PHP 7.1.3
    Instal MySQL
    Install Composer

    type on cmd to create project :
        composer global require "laravel/installer"
        laravel new blogname

check available command or reference in laravel

        php artisan list
        php artisan help [command name] 
            ex. php artisan help make:model 

run laravel

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

setup authentication:
    
        php artisan make:auth
        php artisan migrate

create model , controller , migration for post
        
        php artisan make:controller PostController
        php artisan make:model Post
        php artisan make:migration create_post_table --create=posts
    
        or

        php artisan make:model Post -mc

## Step by Step Tutorial : 

//under maintenance

change welcome to index and modify middleware

         $this->middleware('auth')->except(['index']);

add table column name to post table in migration
eloquent display data and save