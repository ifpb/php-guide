<?php

class Person
{
  public function __construct($name)
  {
    $this->name = $name;
  }

  public function hello()
  {
    return "Hello {$this->name}!";
  }
}

class Student extends Person
{
  public function __construct($name, $course)
  {
    parent::__construct($name);
    $this->course = $course;
  }

  public function __toString()
  {
    return "Name: {$this->name}, Course: {$this->course}";
  }

  public function hello()
  {
    return parent::hello() . "(Course: {$this->course})";
  }
}

$student = new Student('Fulano', 'TSI');

var_dump((string)$student);  //=> string(25) "Name: Fulano, Course: TSI"
var_dump($student->hello()); //=> string(26) "Hello Fulano!(Course: TSI)"
