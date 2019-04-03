<?php
namespace ArrayUtil;

require 'arithmetic/arithmetic.php';
require 'stats/stats.php';

// Unqualified name
var_dump(array_sum([1, 2, 3, 4])); //=> int(10)

// Qualified name
var_dump(Arithmetic\array_sum([1, 2, 3, 4])); //=> string(7) "Sum: 10"

// Fully qualified name
var_dump(\array_sum([1, 2, 3, 4])); //=> int(10)
var_dump(\ArrayUtil\Arithmetic\array_sum([1, 2, 3, 4])); //=> string(7) "Sum: 10"
