#Steps to run

There are two different ways to run this application:
1. Using Docker & Docker composer.
2. Using composer (I personally recommend this way).

##Using docker

You must have [docker and docker composer](https://docs.docker.com/engine/install/) installed, this installation might be very slow in windows so i don't recommend 
to use docker if you are a windows user.

* Run `./initialize.sh`
* Wait until you see the message `NOTICE: ready to handle connections` (or something similar).
* If it doesn't work try to follow the commands inside the `initialize.sh` file 
and execute each one manually.

##Using composer

###Previous requirements

* PHP **8.1**
* [Composer](https://getcomposer.org/download/)
* Mysql (host, database, user and password)
* the following php extensions: **bcmath**, **mbstring**, **mysqli**, 
**pdo**, **pdo_mysql**

###Steps:

* Move to `php/src` (`cd php/src`)
* Run `composer install`
* Copy file `.env.example` to `.env`
* Set your database, database user and database password in the  
`.env` file (`DB_HOST`,`DB_DATABASE`,`DB_USERNAME`,`DB_PASSWORD`)
* Run `php artisan key:generate`
* Run `php artisan migrate --seed`
* Run `php artisan serve`
* (Optional) Run `npm install`
* (Optional) Run `npm run build` o `npm run watch`

#How to use the library system

* Go to [localhost:8000](localhost:8000) in your browser
* Use email: **admin@admin.com** and password: **password** in the login page.
* Enjoy :D

> I really wanted to do more tests but, I can't spend so much time in this project. :(