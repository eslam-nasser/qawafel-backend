# Qawafel backend

## Tech stack

-   Laravel 7
-   Mysql
-   Postman (for api testing)

## API Docs

You can find the documentaiont for the API on [This online Postman docs](https://documenter.getpostman.com/view/5657786/TWDdiDme).

## How to install

1- `git clone https://github.com/eslam-nasser/qawafel-backend.git`

2- create a new mysql db called `qawafel_backend` can change db credentials in `.env` file

3- use the command `composer install` to install the app's dependencies

4- `cd qawafel-backend && php artisan migrate:refresh --seed`

5- `php artisan serve`

6- download and import the postman collection + env

7- start testing

## Need Postman collection and environment variables?

Please contact the developer if you need the latest postman collection and environment.
