# [Operator](http://php.net/manual/en/language.operators.php)

- [Arithmetic](#arithmetic)
- [Comparison ](#comparison)
- [concat](#concat)
- [Execution Operators](#execution-operators)

## Arithmetic
---

```php
var_dump("1"+1);        //=> int(2)
var_dump(25/7);         //=> float(3.5714285714286)
var_dump((int) (25/7)); //=> int(3)
var_dump(round(25/7));  //=> float(4)
var_dump(2 ** 3);       //=> int(8)
```

## [Comparison ](http://php.net/manual/en/types.comparisons.php)
---

```php
var_dump("1 programador"+"1 computador" == "2 passos para o paraíso"); //=> bool(true)
var_dump("1 programador"+"1 computador" === (int)"2 passos paraíso"); //=> bool(true)
var_dump(1 <=> 0); //=> int(1)
var_dump(1 <=> 1); //=> int(0)
var_dump(0 <=> 1); //=> int(-1)
var_dump('fulano' <=> 'sicrano'); //=> int(-1)
var_dump('fulano' <=> 'Sicrano'); //=> int(1)

$a = (object) ["a" => "b"];
$b = (object) ["a" => "b"];
var_dump($a <=> $b); //=> int(0)
```

## concat
---

```php
var_dump("hello"." world"); //=> string(11) "hello world"
```

## Execution Operators
---

```php
var_dump(`pwd`);             //=> string(12) "/pasta_atual"
var_dump(shell_exec('pwd')); //=> string(12) "/pasta_atual"
var_dump(shell_exec('ping -c1 8.8.8.8'));
//=>
// string(249) "PING 8.8.8.8 (8.8.8.8): 56 data bytes
// 64 bytes from 8.8.8.8: icmp_seq=0 ttl=50 time=72.338 ms
// 
// --- 8.8.8.8 ping statistics ---
// 1 packets transmitted, 1 packets received, 0.0% packet loss
// round-trip min/avg/max/stddev = 72.338/72.338/72.338/0.000 ms
// "
```