# 🛒 Laravel E-Commerce Backend – Code Challenge

This is a simple e-commerce backend API built with Laravel 11, designed to demonstrate clean architecture, modular services, and handling both authenticated and guest users through basket-to-order flow.

---

## 🚀 Features

- User authentication with Laravel Sanctum
- Product listing (physical & digital)
- Basket support for both guest and authenticated users
- Checkout flow with tax calculation
- Orders history
- Clean structure using:
    - Enums
    - DTOs
    - Services
    - Repositories
    - API Resources

---

## ⚙️ Tech Stack

- Laravel 12 (Modern app structure)
- PHP 8.2+
- Sanctum (Token-based auth)
- MySQL or SQLite (local dev)
- Postman-ready REST API

---

## 🧰 Setup Instructions

1. **Clone the repository**
```bash
git clone <your-repo-url>
cd <project-folder>
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4․ **Run migrations and seeders**
```bash
php artisan migrate:fresh --seed
```

5. **Serve the application**
```bash
php artisan serve
```

##  Testing User

username: testuser

password: password
