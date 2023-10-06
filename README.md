<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### PHP Version - 8.1
### Laravel Version 10

## Project Setup Laravel
    # First clone the project from the repository https://github.com/Dip-Ghosh/test.git
    # If you are using  homestead then define the php version there.
    # Run composer install
    # Run cp .env.example .env
    # Run  php artisan key:generate
    # Set up Finished

## Database Setup
    # Set your Database name .env
    # Run php artisan migrate
    # Run php artisan db:seed UserSeeder in order to set your login credentials

## Project Architecture
    # I am following Service, Respository Pattern.
    # Service will deal with the logics
    # On the other hand Repository will deal with the query

