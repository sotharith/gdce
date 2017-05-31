# Laravel 5's Package for GDCE

A custom made Laravel5 package used as the connector to Dreamfactory API

## Usage

1- Require package in composer.json
```

"require": {
            ....
            "gdce/framework":"dev-master"
        }

```
2- Run the following command

```
composer update
```

3- Register the service provider in config/app.php 

```

\GDCE\Framework\Auth\CNSWServiceProvider::class
\GDCE\Framework\LaravelDreamfactory\LaravelDreamfactoryServiceProvider::class

```

4- Publish config file

Run the following command to publish the config file

```
php artisan vendor:publish
```

5- Update config file
```
gdce-cnsw-auth.php
gdce-laravel-df.php

7- Update your route by adding the following line
Route::get('auth-callback', 'LoginController@auth_callback');

8- Have fun!

## Package dependencies
```
