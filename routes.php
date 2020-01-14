<?php 

return [
  // Request methods are case sensitive 
  // Format = Controller@method
  'GET' => [
    '' => 'PagesController@home',
    'home' => 'PagesController@home',
    'about' => 'PagesController@about',
    'contact' => 'PagesController@contact',
    'subscribers' => 'SubscribersController@index'
  ],

  'POST' => [
    'subscribers' => 'SubscribersController@store'
  ]

];