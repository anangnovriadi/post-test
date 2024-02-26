# demo-store

## Features
- Laravel 10.x

## Installation & Running Project

### Step 1: Install vendor
        
    composer install

### Step 2: Environment configuration
        
    cp .env.example .env

### Step 3: Run migration
        
    php artisan migrate

### Step 4: Run seeder
        
    php artisan db:seed

### Step 5: Run application
    
    php artisan serve

### API
    
    1. [GET] http://localhost:8000/post/only/get => No Auth
   
    2. [GET] http://localhost:8000/post/auth/get => Auth

## License

[anangnovriadi](https://github.com/anangnovriadi)