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

  public function __toString()
  {
    return "({$this->x},{$this->y})";
  }

  public static function kind()
  {
    return '[type: ' . self::$dimension . ', size:' . self::SIZE . ']';
  }

  public static function distance($a, $b)
  {
    $dx = $a->x - $b->x;
    $dy = $a->y - $b->y;
    return sqrt($dx ** 2 + $dy ** 2);
  }
}

$p1 = new Point(5, 5);
$p2 = new Point(10, 10);

var_dump(Point::SIZE); //=> string(3) "2px"
var_dump(Point::$dimension); //=> string(2) "2D"

var_dump(Point::distance($p1, $p2)); //=> float(7.0710678118655)

var_dump('Point ' . Point::kind() . ' at ' . $p1);
//=> string(35) "Point [type: 2D, size:2px] at (5,5)"
