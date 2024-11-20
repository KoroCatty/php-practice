<?php

class User
{
  // Properties
  public $name;
  public $email;

  // private properties
  private $status = 'active';

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
  }

  // Methods
  public function login()
  {
    echo $this->name . ' logged in <br>';
  }

  // Getter
  public function getStatus() {
    echo $this->status;// private の status を取得するためのメソッド
  }

  // Setter (入ってきた値を status にセットする)
  public function setStatus($status) {
    $this->status = $status;
  }
}

// Instantiate a new object
$user1 = new User('John Doe', 'john@gmail.com');

$user1->login();

$user2 = new User('Jane Doe', 'jane@gmail.com');

$user2->login();

// var_dump($user2);

// echo $user2->status; // this will throw an error because status is a private property

// setter
$user2->setStatus('inactive');

// Getter
$user2->getStatus();




