<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Image Temporary Url Generation
About the sample code: In this project, we store a user with  params: name, type, description, and file. The file is basically an
image with a **maxsize of 5MB**   which is stored in the private directory. The system generates a temporary url for the file which
expires after 10 minutes. There is a cron job which will run every hour and will remove the records older than 30 days.

###  Concepts & Standards Implemented
- Single Responsibility Principle
- Code Abstraction Using Interfaces and Services
- Data Transfer Object
- Request Validations
- Docker
- Test Driven Development
- Code Coverage
- Reports Generation for the Code Coverage
 
###  Third Party Package Used

- [Intervention / image](https://github.com/Intervention/image)

## Project Setup
This project has both the support to run either with the docker or you can also run it as a simple laravel project

## Laravel Run Environment Dependence

- PHP 8.1
- Composer
- Mysql
- Xdebug Extension

#### Setup 
- Create the Database.
- Copy the .env.example to .env
- Change the Database Environment Variables Values
- Run the command **composer install**
- Run the command **php artisan migrate && php artisan serve**


## Docker Environment
- Docker Engine

#### Setup
- Copy the .env.example to .env
- Change the Database Environment Variables Values
- Just run the command **docker compose up**
- Then go in the backend container 
- Run the command **php artisan migrate** 

## Tests & Code Coverage
- This project has implemented the unit test which you can run using command **php artisan test**
- To see the code coverage you can run the command **XDEBUG_MODE=coverage php artisan test --coverage**
- To Generate the code coverage reports run the command **XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html reports**
- You can also view the coverage reports by opening index.html file under the folder **reports**


<br/><br/><br/>