# reason-request
A reason for request library for laravel.

## Installation

Add in composer.json:

```php
"repositories": [
    {
        "type": "vcs",
        "url": "https://libs:ofImhksJ@git.codificar.com.br/laravel-libs/reason-request.git"
    }
]
```

```php
require:{
        "codificar/reasons-request": "0.1.0",
}
```

```php
"autoload": {
    "psr-4": {
        "Codificar\\ReasonsRequest\\": "vendor/codificar/reasons-request/src/"
    },
}
```

Update project dependencies:

```shell
$ composer update
```

Register the service provider in `config/app.php`:

```php
'providers' => [
  /*
   * Package Service Providers...
   */
  Codificar\ReasonsRequest\ReasonsRequestServiceProvider::class,
],
```


Publish Js Libs and Tests:

```shell
$ php artisan vendor:publish --tag=public_vuejs_libs --force
```


Run the migrations:

```shell
$ php artisan migrate
```