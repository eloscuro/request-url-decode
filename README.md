# Request UrlDecode

## Description

This package is intended to perform urldecode of all HTTP parameters in Lumen project.

Lumen for some reason does not do that itself.

## Installation 

```composer require eloscuro/request-url-decode```

.. then add the following to the **bootstrap/app.php** file, section **$app->routeMiddleware(..)**:

```php
'urldecode' => \RequestUrlDecode\MiddleWare::class,
```

.. and finally attach this middleware to your routes inside **routes/web.php** file:

```php
$router->group(['middleware' => 'urldecode'], function () use ($router) {
    $router->get('/hello/{param1}/{param2}', function ($param1, $param2) use ($router) {
        printf('Hello, world! Param1 = %s, param2 = %s', $param1, $param2);
    });
});
```