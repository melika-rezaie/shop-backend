# Shop Backend API

RESTful API for an e-commerce platform built with Laravel.

## Features

- User Authentication (Register, Login, Logout) with Sanctum
- Product Management (CRUD)
- Category Management
- Shopping Cart
- Order Management
- Admin Dashboard (Users, Orders, Products)
- Role-based access (Admin/User)

## Tech Stack

- Laravel 11
- MySQL
- Laravel Sanctum (API authentication)
- PHP 8.2+

## Installation

```bash
# Clone the repository
git clone https://github.com/melika-rezaie/shop-backend.git
cd shop-backend

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shop_db
DB_USERNAME=root
DB_PASSWORD=

# Run migrations
php artisan migrate

# Start development server
php artisan serve
