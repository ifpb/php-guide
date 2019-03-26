<?php

class Person
{
  public function __construct($name)
  {
    $this->name = $name;
  }

  public function hello()
  {
    return "Hello: {$this->name}";
  }
}

class Student extends Person
{
  public function __construct($name, $id)
  {
    parent::__construct($name);
    $this->id = $id;
  }
}

$student = new Student('fulano', 10);

var_dump($student->hello()); 

