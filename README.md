# Library System

## Description

Simple Library Information System

## Requirements

* PHP
* Composer
* MySQL
* Laravel

## Installation

1. Clone repository

```bash
git clone https://github.com/muhihsan1585/library-system.git
```

2. Masuk ke folder project

```bash
cd library-system
```

3. Install dependency Laravel

```bash
composer install
```

4. Copy file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

For Windows Command Prompt:

```bash
copy .env.example .env
```

5. Generate application key

```bash
php artisan key:generate
```

6. Buat database MySQL dengan nama:

```text
library_system
```

7. Atur konfigurasi database pada file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=library_system
DB_USERNAME=root
DB_PASSWORD=
```

8. Jalankan migration

```bash
php artisan migrate
```

9. Jalankan Laravel development server

```bash
php artisan serve
```

10. Buka browser dan akses:

```text
http://127.0.0.1:8000
```

## Author

Nama: [Muhammmad Ihsan]
NIM: [2410631250018]
