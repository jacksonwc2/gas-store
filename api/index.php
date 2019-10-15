<?php
//http://clubedosgeeks.com.br/programacao/php/api-restful-com-php-e-slim-framework?fbclid=IwAR23jF5OwKfs5XsaIEz3K3-Avc-haj0mcHBKbbf0-ZPj0IK2vTfoCXCFhlI
$loader = require 'vendor/autoload.php';
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

$app->run();