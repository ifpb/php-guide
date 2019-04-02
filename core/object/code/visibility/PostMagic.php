<?php

class Post
{
  private $title;
  private $text;

  public function __construct($title, $text)
  {
    $this->title = $title;
    $this->text = $text;
  }

  public function __get($name)
  {
    return $this->$name;
  }

  public function __set($name, $value)
  {
    $this->$name = $value;
  }
}

$post = new Post('Lorem ipsum dolor', 'Nunc accumsan in ipsum a mattis...');

var_dump($post->title); //=> string(17) "Lorem ipsum dolor"

$post->title = 'Dolor';
var_dump($post->title); //=> string(5) "Dolor"
