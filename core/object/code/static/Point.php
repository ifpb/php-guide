<?php
class Point
{
  const SIZE = '2px';
  public static $dimension = '2D';
  public $x;
  public $y;

  public function __construct($x, $y)
  {
    $this->x = $x;
    $this->y = $y;
  }

  public static function distance($a, $b)
  {
    $dx = $a->x - $b->x;
    $dy = $a->y - $b->y;
    return sqrt($dx ** 2 + $dy ** 2);
  }

  public function __toString()
  {
    return "({$this->x},{$this->y})";
  }

  public static function kind()
  {
    // return "${self::$dimension} - ${self::SIZE}";
    return '[type: ' . self::$dimension . ', size:' . self::SIZE . ']';
  }
}

$p1 = new Point(5, 5);
$p2 = new Point(10, 10);

var_dump(Point::distance($p1, $p2)); //=> float(7.0710678118655)

var_dump(Point::SIZE);

var_dump(Point::$dimension);

var_dump('Point ' . Point::kind() . ' at ' . $p1);
