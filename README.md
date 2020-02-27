# MFour Assessment

A PHP Laravel CRUD API Backend utilizing a MySQL Database.

## Introduction

For this project, I will assume that PHP, Composer and MySQL are already installed on your machine.
- First, please clone this repository to a directory of your choice.
- I used Valet (Mac OS _only_) as my dev environment. If you are on windows, you can simply use:
```shell
php artisan serve
```
- This should output something like this:
  ```shell
  Laravel development server started: http://127.0.0.1:8000
  ```
- You can simply visit http://localhost:8000 and you should see some rendered HTML.
- If you do not have MySQL installed on your machine, you can use homebrew to install it:
  ```shell
  brew install mysql
  ```
- After installing MySQL, in terminal:
  ```shell
  brew services start mysql
  ```
- Import the provided "mfour_2020-02-26.sql" dump located in /database.
  - In terminal:
  ```shell
  mysql -u root
  ```
  - Example Output:
  ```shell
  Welcome to the MySQL monitor.  Commands end with ; or \g.
  Your MySQL connection id is 659
  Server version: 5.7.29 Homebrew

  Copyright (c) 2000, 2020, Oracle and/or its affiliates. All rights reserved.

  Oracle is a registered trademark of Oracle Corporation and/or its
  affiliates. Other names may be trademarks of their respective
  owners.

  Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

  mysql>
  ```
  - Then enter:
  ```shell
  mysql> create database mfour;
  ```
  - Lastly, we will import the .sql file. Please type `exit` into the terminal and hit enter.
  - Once you are out of the mysql monitor, please make sure you are in the project's directory and in terminal:
  ```shell
  mysql -u root mfour < database/mfour_2020-02-26.sql
  ```
  - NOTE: If you are using a PHP version that's less than or equal to 7.2, you may need to change the root user auth method.
    - You can do this with terminal:
      - Enter MySQL monitor:
      ```shell
      mysql -u root
      ```
      - Then:
      ```shell
      mysql> alter user 'root'@'localhost' identified with mysql_native_password by 'root';
      ```

#### Valet Setup (Mac OS _only_)
Installing Valet is very quick and easy.
- Please make sure the `~/.composer/vendor/bin` directory is in your system's "PATH".
- In terminal:
  ```shell
  composer global require laravel/valet
  ```
- Next, we will install Valet and DnsMasq, and register Valet's daemon to launch when your system starts. We can achieve this by running this simple command:
  ```shell
  valet install
  ```
- To make sure Valet is working, you can ping any *.test domain through terminal:
  ```shell
  ping cool.test
  ```
##### Example Output From Ping
```shell
Kevins-MacBook-Pro:laravel-1 kevinihm$ ping cool.test
PING cool.test (127.0.0.1): 56 data bytes
64 bytes from 127.0.0.1: icmp_seq=0 ttl=64 time=0.025 ms
64 bytes from 127.0.0.1: icmp_seq=1 ttl=64 time=0.055 ms
64 bytes from 127.0.0.1: icmp_seq=2 ttl=64 time=0.090 ms
--- cool.test ping statistics ---
5 packets transmitted, 5 packets received, 0.0% packet loss
round-trip min/avg/max/stddev = 0.025/0.068/0.090/0.025 ms
Kevins-MacBook-Pro:laravel-1 kevinihm$
```
- Lastly, we need to tell Valet in which directory to look for our projects.
  - Change directory into the parent directory of the project's directory and type into terminal:
  ```shell
  valet park
  ```
  - Now, any project existing in this folder will accessible in our browser through http://_{directory name}_.test
- If you're looking for some extra information you can visit this [link](https://laravel.com/docs/5.8/valet) and read through the installation section.

## Getting Started

1. Install all dependencies in `composer.json` with Composer.
    ```shell
    composer install
    ```
    or if you didn't want to add `~/.composer/vendor/bin` to your system's "PATH":
    ```shell
    php composer.phar install
1. If you do not have composer installed, please follow the simple step-by-step guide [here](https://getcomposer.org/download/)
1. Make sure you are in the project's root directory in terminal, please locate the .env.example file and make a new file ".env".
    ```shell
    cp .env.example .env
    ```
1. We will change 3 things:
    - DB_DATABASE = _mfour_
    - DB_USERNAME = _root_
    - DB_PASSWORD = _(If there is a value specified here, please remove it and leave it empty)_

## Features

- User can view all current users in the database.
- User can create a user.
- User can update a user.
- If you would like to view a simple front-end that I built for the API, you can click [here](http://laravel-1.test) to open it in your browser.


## Server API

### The Control Flow

- Model -> /app/Users.php
- View -> /resources/views
- Controller -> /app/Http/Controllers/UsersApiController.php

Once a request triggers a `route`, the `route` will call a method within the `UsersApiController`.
- GET requests will simply call the all() method from the `Users` model and return the data that exists in the database.
- A POST request to create a new user will validate required fields, as well as make sure the email provided is unique, and then create a new user instance as defined by the `Users` model.
- A POST request to update an existing user will validate that the value(s) for the provided fields are strings and that the email (if provided) is unique. It will then update the specific User's field(s) and save it to the database.

#### `GET /api/users`

Responds with all current `users` in the database.

##### Example Request
```shell
curl -v http://laravel-1.test/api/users | json_pp
```
- NOTE: "json_pp" is a Perl command utility.

##### Example Response Body

```json

   {
      "last_name" : "Ihm",
      "first_name" : "Kevin",
      "updated_at" : "2020-02-26 19:47:15",
      "id" : 1,
      "created_at" : "2020-02-25 11:32:44",
      "email" : "kevinihm@gmail.com"
   },
   {
      "last_name" : "Smith",
      "first_name" : "John",
      "updated_at" : null,
      "id" : 2,
      "created_at" : "2020-02-25 12:09:43",
      "email" : "jsmith@example.com"
   },
   {
      "first_name" : "Jane",
      "updated_at" : null,
      "id" : 3,
      "created_at" : "2020-02-25 12:09:59",
      "email" : "jdoe@example.com",
      "last_name" : "Doe"
   },
]
```

#### `POST /api/users/create`

Accepts a single `user` object in the request body and inserts it into the `users` table. Responds with the inserted `user`, including an auto-generated `id`.

##### Example Request
```shell
curl -X POST -H "Content-Type: application/json" -d '{"first_name": "test-first", "last_name": "test-last", "email": "test-email@test.com"}' http://laravel-1.test/api/users/create | json_pp
```

##### Example Request Body

```json
{
  "first_name": "test-first",
  "last_name": "test-last",
  "email": "test-email@test.com"
}
```

##### Example Response Body

```json
{
   "updated_at" : "2020-02-26 23:22:16",
   "first_name" : "test-first",
   "email" : "test4@let.com",
   "created_at" : "2020-02-26 23:22:16",
   "id" : 37,
   "last_name" : "test-last"
}
```

#### `POST /api/users/update/{userID}`

Updates a `user` from all recorded `users`, given an `id` in the request URL. _e.g._ `/api/users/update/3`. Responds with the updated user.

##### Example Request

```shell
curl -X POST -H "Content-Type: application/json" -d '{"first_name": "Jane2", "last_name": "Doe1", "email": "jdoe1@example.com"}' http://laravel-1.test/api/users/update/3 | json_pp
```
Or send only the field you want to update:
```shell
curl -X POST -H "Content-Type: application/json" -d '{"email": "jdoe@example.com"}' http://laravel-1.test/api/users/update/3 | json_pp
```

##### Example Response Body

```json
{
   "last_name" : "Doe1",
   "created_at" : "2020-02-25 12:09:59",
   "id" : 3,
   "email" : "jdoe1@example.com",
   "first_name" : "Jane2",
   "updated_at" : "2020-02-27 03:20:37"
}
```
Or using only the field you want to update
```json
{
   "last_name" : "Doe1",
   "email" : "jdoe@example.com",
   "id" : 3,
   "updated_at" : "2020-02-27 03:21:32",
   "created_at" : "2020-02-25 12:09:59",
   "first_name" : "Jane2"
}
```


























<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
