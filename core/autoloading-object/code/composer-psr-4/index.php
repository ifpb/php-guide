<?php
require __DIR__ . '/vendor/autoload.php';

use ArrayUtil\ArrayUtil as ar;

$array = [1, 2, 3, 4];

var_dump(ar::sum($array)); //=> float(10)
var_dump(ar::min($array)); //=> float(1)
