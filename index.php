<?php 
require 'vendor/autoload.php';
$config = require 'config.php';
$router = require 'routes.php';
require 'helpers.php';

//use App\Database\{QueryBuilder, Connection};

function request($router, $config) {
  $requestUri = explode('/', $_SERVER['REQUEST_URI']);
  $requestUri = array_values(array_filter($requestUri)); // remove empty elements (array_filter) and reindex (array_values)

  // check to see if the app is in a folder in the doc root
  if ($config['ROOT_FOLDER'] !== '') {
    $key = array_search($config['ROOT_FOLDER'], $requestUri); // returns index or false 
    if ($key !== false) {
      array_splice($requestUri, $key, 1); // remove the app folder from the uri
    }
  } 
  //var_dump($requestUri);
  $routeRequest = (count($requestUri) > 0) ? $requestUri[0] : $requestUri[0] = ''; // if empty, give array at least one empty element
  
  if (! array_key_exists($routeRequest, $router[$_SERVER['REQUEST_METHOD']])) {
    throw new \Exception("No route set called '{$routeRequest}'");
  }
  //var_dump($router[$_SERVER['REQUEST_METHOD']][$routeRequest]);
  return $router[$_SERVER['REQUEST_METHOD']][$routeRequest]; // something like controller@method
}
$request = request($router, $config);

function control($request) {
  $controllerAndMethod = explode('@', $request); // [0] => controller, [1] => method
  $controller = $controllerAndMethod[0];
  $method = $controllerAndMethod[1];
  $controller = "App\\Controllers\\{$controller}";
  $controller = new $controller;
  if (! method_exists($controller, $method)) {
    throw new \Exception("Can't find {$method} in {$controller}");
  }
  return $controller->$method();
}
control($request);
