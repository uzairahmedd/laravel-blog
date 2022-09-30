<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Blog Application

This is blog application, as assessment from UXBERT, build with Laravel 8.x with some basic commenting feature. Please find below, the steps to setup the application along with data seeding.

- Laravel 8.x
- Tailwind CSS
- TinyMCE

## Features

- Guest user can read blogs and their comments
- Authenticated user can manage his own blogs
- Authenticated user can comment on blogs
- Main page lists all the published blogs (if a user is authenticated, he can see edit manage actions on his published blogs)
- My Blogs Page list blogs which are published by current authenticated user

## Requirements
- Git
- Composer
- PHP (7 or above)
- Mysql
- Node and NPM (Latest Stable Versions)

## Installation

Clone the repo and setup .env file
```sh
git clone git@github.com:uzairahmedd/laravel-blog.git
cd laravel-blog
cp .env.example .env 
```
Update the database info in your .env

Install the packages
```sh
composer install
npm install
npm run dev
```
Create database by name specificed in .env and then migrate and seed database using following commands
```sh
php artisan migrate
php artisan db:seed
```
Run the server
```sh
php artisan serve
```
And visit the listed link which could be like following
```sh
http://127.0.0.1:8000/
```
