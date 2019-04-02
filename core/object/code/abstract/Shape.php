<?php

abstract class Shape
{
  protected $name;

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public abstract function area();

  public abstract function __toString();
}

class Square extends Shape
{
  public function __construct($side)
  {
    $this->name = "square";
    $this->side = $side;
  }

  public function area()
  {
    return $this->side ** 2;
  }

  public function __toString()
  {
    return "Shape {$this->name} (side: {$this->side}, area: {$this->area()})";
  }
}

class Circle extends Shape
{
  public function __construct($radius)
  {
    $this->name = "circle";
    $this->radius = $radius;
  }

  public function area()
  {
    return M_PI * $this->radius ** 2;
  }

  public function __toString()
  {
    return "Shape {$this->name} (side: {$this->radius}, area: {$this->area()})";
  }
}

class ShapeSet
{
  private static $shapes = [];

  public static function add($id, $shape)
  {
    self::$shapes[$id] = $shape;
  }

  public static function shapes()
  {
    return self::$shapes;
  }
}

$c = new Circle(5);
ShapeSet::add(1, $c);

$s = new Square(10);
ShapeSet::add(2, $s);

print_r(ShapeSet::shapes());
//=>
// array(
//   [1] => Circle Object(
//     [name:protected] => circle
//     [radius] => 5
//   )[2] => Square Object(
//     [name:protected] => square
//     [side] => 10
//   )
// )
