# [Arrays](http://php.net/manual/en/book.array.php)

- [sizeof()](#sizeof)
- [sort()](#sort)

## sizeof()
---

```php
$fruits = ["lemon", "orange", "banana", "apple"];
var_dump(sizeof($fruits)); //=> int(4)
```

## sort()
---

```php
$fruits = ["lemon", "orange", "banana", "apple"];
sort($fruits);
var_dump($fruits);
//=>
// array(4) {
//   [0]=> string(5) "apple"
//   [1]=> string(6) "banana"
//   [2]=> string(5) "lemon"
//   [3]=> string(6) "orange"
// }
```

<!-- TODO https://medium.com/@brenodouglas/conhecendo-um-pouco-das-fun%C3%A7%C3%B5es-de-array-filter-map-e-reduce-com-php-cd02f6d51857#.ea71a973t
// array_filter(), array_map(), array_reduce(), array_walk(), foreach
function selectAddress($address){
  return $address["address"];
}
print_r(array_map("selectAddress", $arrayAddress)); 
-->