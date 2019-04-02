<?php

interface Calculator
{
  public function addition($a, $b);
  public function subtraction($a, $b);
}

interface Randomizer
{
  public function random();
  public function randomRange($min, $max);
}

class Util
{
  public function addition($a, $b)
  {
    return $a + $b;
  }

  public function subtraction($a, $b)
  {
    return $a - $b;
  }

  public function multiplication($a, $b)
  {
    return $a * $b;
  }

  public function random()
  {
    return rand();
  }

  public function randomRange($min, $max)
  {
    return rand($min, $max);
  }
}

$util = new Util();

var_dump($util->randomRange(1, 10));   //=> int(5)
var_dump($util->subtraction(100, 10)); //=> int(90)
