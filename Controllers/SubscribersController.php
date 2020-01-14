<?php 
namespace App\Controllers;

class SubscribersController {
  public function index() {
    $connection = database();
    $data = $connection->selectAll('email_subscriber');
    //return view('index'); 
    return view('subscribers', ['data' => $data]);
  }

  public function store()
  {
    $connection = database();
    $data = $connection->insert('email_subscriber', ['email' => $_POST['email']]);
    return redirect('subscribers');
  }
}