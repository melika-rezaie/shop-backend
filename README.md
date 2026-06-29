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

# Frontend Repository
[Shop-Frontend
](https://github.com/melika-rezaie/shop-frontend)

License
MIT

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
API Endpoints
Public Routes
Method	Endpoint	Description
POST	/api/register	Register new user
POST	/api/login	User login
GET	/api/products	Get all products
GET	/api/products/{id}	Get single product
Protected Routes (require authentication)
Method	Endpoint	Description
POST	/api/logout	User logout
GET	/api/user	Get user info
POST	/api/cart	Add to cart
GET	/api/cart	Get cart items
POST	/api/orders	Place order
GET	/api/orders	Get user orders
Admin Routes
Method	Endpoint	Description
GET	/api/admin/dashboard	Dashboard stats
GET	/api/admin/products	Manage products
POST	/api/admin/products	Create product
PUT	/api/admin/products/{id}	Update product
DELETE	/api/admin/products/{id}	Delete product
GET	/api/admin/orders	Manage orders
PUT	/api/admin/orders/{id}/status	Update order status
GET	/api/admin/users	Manage users
PUT	/api/admin/users/{id}/toggle-admin	Toggle admin role
DELETE	/api/admin/users/{id}	Delete user

