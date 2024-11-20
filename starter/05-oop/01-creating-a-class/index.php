<?php 

class User {
  // properties 
  public $name;
  public $email;

  // constructor 
  public function __construct($name, $email) { // constructor is a special method that is called when an object is created
    echo 'Constructor called';
    $this->name = $name;
    $this->email = $email;
  }

  // Methods 
  public function login(){
    echo $this->name . ' logged in';
  }
}

// Instantiate a new object (ここに引数を入れる)
$user1 = new User('Koro','koro@email.com');

// method call
$user1->login();



$user2 = new User('bee','bee@email.com');
// method call
$user2->login();

var_dump($user1);