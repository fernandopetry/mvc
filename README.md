# Pacote de gerenciamento do MVC

## Exemplo de htaccess

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php?router=/$1 [QSA,L]
</IfModule>
```

## Usage 1

```php
<?php
use \Petry\MVC\Uri\Parse;
use \Petry\MVC\Uri\Param;
use \Petry\MVC\Uri\GetByURI;

$uri = new GetByURI('router');
$param = new Param($uri);
$parse = new Parse($param);

$parse->getController(); // Controller
$parse->getAction(); // Action
$parse->getParams(); // Params
```

## Usage 2 | Facade
```php
<?php
use \Petry\MVC\Uri\UriFacade;

$facade = new UriFacade('router');
$facade->getController(); // Controller
$facade->getAction(); // Action
$facade->getParams(); // Params
```

## Install composer
```ssh
$ composer require fernandopetry/mvc
```

## Usage ControllerFactory
```php
<?php

use \Petry\MVC\Uri\UriFacade;

try {
    $factory = new \Petry\MVC\Controller\ControllerFactory(new UriFacade('router'),'Petry\Test\Controller');
    $factory->factory();
}catch (Exception $e){
    echo $e->getMessage();
}
```
