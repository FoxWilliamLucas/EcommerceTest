## How To Install

#### First Of All:
- open your terminal 
``` 
git clone git clone https://github.com/FoxWilliamLucas/EcommerceTest.git
cd testEcommerceProject
composer install
cp .env.example .env
php artisan key:generate
```
- Create an empty database for our application
- return to terminal
```
php artisan migrate
php artisan serv
```
it will help running applications on the PHP development server url http://lcoalhost:8000 by default

- open your browsre and go to http://lcoalhost:8000
##  Enjoy !!

## Assignment Desctiption
Using Laravel, develop a simple e-commerce API application (Frontend& backend) which provides these features:
- A merchant can sign up and sign in with email and password.
- Every merchant has a store.
- A merchant can add standalone products with name, description, and price (no need for options or images).
- Guests can create carts
- Guests can add products to their carts.

## ERD Diagram
![ERDDiagram1](https://user-images.githubusercontent.com/92229520/136671954-d666839e-d16b-4efa-ad7a-2ee23d31375d.png)

## API Documentation
https://documenter.getpostman.com/view/8046650/UV5RkKsW


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
