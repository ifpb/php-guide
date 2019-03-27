<?php

interface Coffee
{
  public function getCost();
  public function getDescription();
}

class SimpleCoffee implements Coffee
{
  public function getCost()
  {
    return 10;
  }

  public function getDescription()
  {
    return 'Simple coffee';
  }
}

abstract class CoffeeDecorator implements Coffee
{

  protected $coffee;

  public function __construct(Coffee $coffee)
  {
    $this->coffee = $coffee;
  }

  public function getCost()
  {
    return $this->coffee->getCost();
  }

  public function getDescription()
  {
    return $this->coffee->getDescription();
  }
}

class MilkCoffee extends CoffeeDecorator
{
  public function getCost()
  {
    return $this->coffee->getCost() + 2;
  }

  public function getDescription()
  {
    return $this->coffee->getDescription() . ', milk';
  }
}

class VanillaCoffee extends CoffeeDecorator
{
  public function getCost()
  {
    return $this->coffee->getCost() + 3;
  }

  // public function getDescription()
  // {
  //   return $this->coffee->getDescription() . ', vanilla';
  // }
}

$someCoffee = new SimpleCoffee();
var_dump($someCoffee->getCost()); //=> int(10)
var_dump($someCoffee->getDescription()); //=> string(13) "Simple Coffee"

$someCoffee = new MilkCoffee($someCoffee);
var_dump($someCoffee->getCost()); //=> int(12)
var_dump($someCoffee->getDescription()); //=> string(19) "Simple Coffee, milk"

$someCoffee = new VanillaCoffee($someCoffee);
var_dump($someCoffee->getCost()); //=> int(20)
// var_dump($someCoffee->getDescription()); //=> string(28) "Simple Coffee, milk, vanilla"
