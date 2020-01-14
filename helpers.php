<?php 

use App\Database\{QueryBuilder, Connection};

function view($name, $data = []){
  extract($data);
  return require "Views/{$name}.view.php";
}

function redirect($path){
  $config = require 'config.php';
  $rootFolder = $config['ROOT_FOLDER'].'/';
  header("Location: /{$rootFolder}{$path}");
}

function database() {
  $config = require 'config.php';
  $connection = new QueryBuilder(
    Connection::make($config['database'])
  );
  return $connection;
  //var_dump($connection->selectAll('email_subscriber'));
}
