Built With Laravel

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Installing 

Using Laravel docs, I'm guessing you've installed composer and have node installed. just run 

	composer install
	php artisan serve

## Runing the local copy
Create a database matching the configuration in your .env
Run
    
    php artisan migrate
    php artisan db:seed

## Troubleshooting
1. if the migrate command fails with an error 
 
    Changing columns for table "table_name" requires Doctrine DBAL; install "doctrine/dbal" ...

Run

    composer require doctrine/dbal