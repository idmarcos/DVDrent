## Requirements
- php: "^7.3|^8.0"
- laravel: 8


## Install Project

Download the project
```
git clone https://github.com/idmarcos/DVDrent.git
```

## Getting Started

Create the vendor folder
```
composer install
```

Create file `.env` from `.env.example` and put your database credentials
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Then execute
```
php artisan key:generate
```

When the database exists we execute the migrations and seeders
```
php artisan migrate --seed
```

Execute
```
php artisan serve
```

## Basic Usage

Admin user credentials
```
user=admin@dvdrent.com
pass=admin
```

User credentials
```
user=
pass=password
```

## Testing
```
./vendor/bin/phpunit
```
