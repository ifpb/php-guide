<?php

class Post
{
  public $title;
  public $text;

  public function __construct($title, $text)
  {
    $this->title = $title;
    $this->text = $text;
  }
}

$post = new Post('Lorem ipsum dolor', 'Nunc accumsan in ipsum a mattis...');
var_dump($post);
//=>
// object(Post)#1 (2) {
//   ["title"] => string(17) "Lorem ipsum dolor"
//   ["text"]  => string(34) "Nunc accumsan in ipsum a mattis..."
