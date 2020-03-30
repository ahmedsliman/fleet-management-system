# Fleet management system

# Setup

## PHP components

```bash
composer update
```

## NODE packages

```bash
npm install
```

## MySQL

```bash
php artisan migrate

php artisan db:seed --class=UserSeeder
php artisan db:seed --class=CitySeeder
```

## To Run

```bash
php artisan serve
```

## Admin

```bash
ahmedsliman@gmail.com
adminforfleet
```

## Endpoints

-   To check avialability depends on the departure and distination, `http://127.0.0.1:8000/book?departure=2&distination=3`
-   To book a seat for travel, return seat number **POST**, `http://127.0.0.1:8000/book`
