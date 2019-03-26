<?php

trait CalculatorMixin
{
  public function addition($a, $b)
  {
    return $a + $b;
  }

  public function subtraction($a, $b)
  {
    return $a - $b;
  }
}

trait RandomizerMixin
{
  public function random()
  {
    return rand();
  }

  public function randomRange($min, $max)
  {
    return rand($min, $max);
  }
}

class Util
{
  use CalculatorMixin, RandomizerMixin;

  public function multiplication($a, $b)
  {
    return $a * $b;
  }
}

$util = new Util();

var_dump($util->randomRange(1, 10));   //=> int(5)
var_dump($util->subtraction(100, 10)); //=> int(90)
