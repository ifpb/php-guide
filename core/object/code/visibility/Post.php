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

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getText()
  {
    return $this->text;
  }

  public function setText($text)
  {
    $this->text = $text;
  }
}

$post = new Post('Lorem ipsum dolor', 'Nunc accumsan in ipsum a mattis...');
$post->setTitle('Dolor');
$title = $post->getTitle();
var_dump($title);   //=> string(5) "Dolor"
$post->title;       
