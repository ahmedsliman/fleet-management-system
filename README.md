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

## To Generate Token for the Endpoints

-   Make post request on `http://127.0.0.1:8000/api/token`

```bash
email: ahmedsliman@gmail.com
password: adminforfleet
```

## Endpoints

-   Both Endpoints relies on departure and distination inputs as GET/POST variables (values MUST be numbers exists [here](http://127.0.0.1:8000/))
-   To check avialability depends on the departure and distination, `Ex: http://127.0.0.1:8000/api/book?departure=2&distination=3`
-   To book a seat for travel, return seat number **POST**, `http://127.0.0.1:8000/api/book`
