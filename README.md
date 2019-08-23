# openiai

*Version:* `0.1.3`

This library is yet unfinished. Use it only at your own risk.
Feel free to contribute.


##Summary

Open IAI API PHP wrapper library.

This is a Laravel library that lets you easily connect to IdoSell Shop API 
and make requests. It aims to cover the whole API (all gates and methods,
 which are automatically looked for).
                   

##Requirements
* PHP 7.2
* Laravel 5.8
* ext-json
* ext-soap

##Installation

Simply use Composer to install this package, either by executing CLI command
in your project directory:

```bash
composer require tombabolewski/openiai
```

or by adding the following line to your `composer.json` file in `require`
section:

```json
"require" : {
  "tombabolewski/openiai" : "^0.1.3"
}
```

Next, you should add the Service Provider to your `config/app.php` file.
Just add the following line to the `providers` array, preferably at the end:

```php
'providers' => [
    (...)
    Tombabolewski/Openiai/OpeniaiServiceProvider::class,
],
```

If you would like, you can also add an alias to the `aliases` array like that:
```php
'aliases' => [
    (...)
    'Openiai' => Tombabolewski/Openiai/Client::class
],
```


##Usage

Section under construction ;]

Example:
```php
//Create openiai client instance
$client = app()->make('Openiai');

//Get all products
$products = $client->Products->get();
```