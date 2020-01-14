<?php 
$env = require 'env.php';

return [
  'database' => [
    'name' => $env['DB_NAME'],
    'password' => $env['DB_PASSWORD'],
    'username' => $env['DB_USERNAME'],
    'connection' => 'mysql:host=127.0.0.1',
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'ROOT_FOLDER' => 'minimal-mvc-routes' // if your app's $_SERVER['REQUEST_URI'] is not '/', add it here
];