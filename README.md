# Restaurant Management System

## Brief Description

The Restaurant Management System is a web application built to streamline the management of restaurants and their menus. It provides an admin dashboard to perform CRUD operations on restaurants, manage their food items, and handle addons.

## Project Demo

Watch the demo video [here](https://www.loom.com/share/0a89e5347b7a40cf876ae89e3d36ec93?sid=45253a2b-701a-41c7-927e-8ba7188b9d90).

## API Documentation

Explore the Postman API collections [here](https://elements.getpostman.com/redirect?entityId=14911640-304b4706-bb37-4155-9ce4-14abb5891a35&entityType=collection).

## Features

- Admin dashboard for managing restaurants and menus
- CRUD functionality for restaurants
- Ability to add, edit, and delete food items
- Support for addons to customize food items
- Webhook system to notify external clients of restaurant updates
- SMS gateway integration for sending notifications


## Admin Credentials

- email: admin@example.com
- Password: Pa$$w0rd!


## Technology Stack

- Laravel for the backend
- Vue.js for the frontend
- MySQL for the database
- Laravel Sanctum for authentication
- Postman for API testing

## Installation and Local Setup

Follow these steps to install and run the project locally:

1. Clone the repository:

```bash
git clone https://github.com/xohaibdev/FoodieHub-LaravelVue.git
cd FoodieHub-LaravelVue
composer install
npm install
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve
