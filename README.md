![web](https://github.com/lailyrhmh/Course-Web/assets/91611703/e4b752ee-a79b-418d-88f3-155e2361d861)
# Course Web

Demo website 
<!-- commment -->
How to run in local:

- Clone your project
- Create empty database `course`
- Go to the folder application using cd command on your cmd or terminal 

    Run `cd Course-Web`
- Run `composer install` on your cmd or terminal
- Copy `.env.example` file to `.env` on the root folder. 

    Run `copy .env.example .env` if using command prompt Windows

    or `cp .env.example .env` if using terminal, Ubuntu
- Open your `.env` file and change the database name (DB_DATABASE) to `album`, username `root` and password ```""``` .
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh`
- Run `php artisan db:seed --class=CourseTableSeeder`
- Run `php artisan db:seed --class=MaterialTableSeeder`
- Run `php artisan serve`
- Go to http://127.0.0.1:8000
