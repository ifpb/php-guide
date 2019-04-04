<?php
namespace ArrayUtil\Stats;

trait Stats
{
  public static function min($array): float
  {
    $minValue = $array[0];

    for ($flag = 1; $flag < sizeof($array); $flag++) {
      if ($minValue >  $array[$flag])
        $minValue = $array[$flag];
    }

    return $minValue;
  }
}
