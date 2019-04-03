<?php
require 'arrayutil.php';

// Unqualified name
var_dump(min([1, 4, 2, 6, 10, 3])); //=> int(1)

// Qualified name
var_dump(ArrayUtil\min([1, 4, 2, 6, 10, 3])); //=> string(10) "Minimum: 1"

// Fully qualified name
var_dump(\min([1, 4, 2, 6, 10, 3])); //=> int(1)
var_dump(\ArrayUtil\min([1, 4, 2, 6, 10, 3])); //=> string(10) "Minimum: 1"
