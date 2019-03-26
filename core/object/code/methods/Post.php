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

  public function toHMTL()
  {
    return "<div><h1>$this->title</h1><p>$this->text</p></div>";
  }
}

$post = new Post('Lorem ipsum dolor', 'Nunc accumsan in ipsum a mattis...');

var_dump($post->toHMTL());
//=> string(78) "<div><h1>Lorem ipsum dolor</h1><p>Nunc accumsan in ipsum a mattis...</p></div>"
