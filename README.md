
# Kangaroo Tracker

This is a mini-program for storing information about  kangaroos.


## Requirements

- PHP 8.x
- Composer installed. see (https://getcomposer.org/download) on how to install
- MySql / MariaDB 5.0 or later


## Installation

#### Setting up database connection. ####
- copy .env.example to .env file and put your database connection properties

```
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### Installing the application ####
- open terminal in the root folder of the application and enter the following command in order.
```
composer install
```

```
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
```

#### Running the application 
Command:
``` 
php artisan serve
``` 

Test your application by going to your web browser and type this address:
http://localhost:8000


### Note ###
The defaullt username and password is **admin**
## Authors

- [@rodino25](https://www.github.com/rodino25)

