<?php

class Post
{
  public function __construct($title, $text)
  {
    $this->title = $title;
    $this->text = $text;
  }
}

$post = new Post('Lorem ipsum dolor', 'Nunc accumsan in ipsum a mattis...');

var_dump($post->title); //=> string(17) "Lorem ipsum dolor"

$post->title = 'Dolor';
var_dump($post->title); //=> string(5) "Dolor"
