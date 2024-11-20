<?php

class User
{
  public $name;
  public $email;
  protected $status = 'active';

  public function __construct($name, $email)
  {
    $this->name = $name;
    $this->email = $email;
  }

  public function login()
  {
    echo $this->name . ' logged in <br>';
  }
}

class Admin extends User {
  public $level;

  public function __construct($name, $email, $level) {
    $this->level = $level; // set the level property
    parent::__construct($name, $email); // pass the name and email to the parent constructor which is User class
  }

  // override 
  public function login() {
    echo 'Admin' . $this->name . ' logged in <br>';
  }

  // method
  public function getStatus() {
    echo $this->status;
  }
}

$admin1 = new Admin('Boro','Boro@email.com', 5 ); // 

// 親の User クラスのプロパティにアクセスできる
echo $admin1->name . '<br>'; // Boro
echo $admin1->email . '<br>'; // Boro@emailc.om
echo $admin1->level . '<br>'; // 5
// method 
$admin1->login(); // Boro logged in


$admin1->getStatus(); // active