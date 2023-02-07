# Clothing-Management-application

This is laravel online colthing management aplication

pre-requrements

    install xampp or wampp server
    install node js
    install comporser - https://getcomposer.org/download/
        (download exe file and install, do not provide poxy)
    
setup pc 

open cmd and type this

        composer global require laravel/installer
    
setup project

1. clone this repo

2. open cmd in that folder

3. Then run bellow command

4. install vender files

        composer install

        composer update

5. install node files

        npm install

6. cope example .env file to .env file

        copy .env.example .env

7. Genarete the key

        php artisan key:generate   

8. create database name workers_yard

9. change bellow if you use another one in .env file

        DB_DATABASE=clara_clothing

        DB_USERNAME=root

        DB_PASSWORD=

10. Run these command and run the project

        npm run dev

11. open another cmd in that project folder and run this command in that

        php artisan migrate

        php artisan serve
