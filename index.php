<?php

require_once 'vendor/autoload.php';

/*
Default values for algorithms

PASSWORD_DEFAULT
    array (size=1)
      'cost' => int 10

PASSWORD_ARGON2I
      'memory_cost' => int 65536
      'time_cost' => int 4
      'threads' => int 1

PASSWORD_ARGON2ID
    array (size=3)
      'memory_cost' => int 65536
      'time_cost' => int 4
      'threads' => int 1
 */

/* Bcrypt */

// 1. Хеширование
/*$password = new \App\Password('12345678');
$bcrypt = new \App\Algorithm\Bcrypt(null, 4);
$hash = $password->hash($bcrypt); //$2y$04$iK9k7hG3A3TUFsGirjAcPO2P2EHYnOllZcS1KwSr1ZglmtJVT7ZNa
var_dump($hash);*/


// 2. Проверка хеша
/*$password = new \App\Password('12345678');
$var1 = $password->verify('$2y$04$iK9k7hG3A3TUFsGirjAcPO2P2EHYnOllZcS1KwSr1ZglmtJVT7ZNa'); //true
$var2 = $password->verify('$2y$04$iK9k7hG3A3TUFsGirjAcPO2P2EHYnOllZcS1KwSr1ZglmtJVT7ZNa1'); //false
var_dump($var1);
var_dump($var2);*/


// 3. Проверка на соответствие алгоритму
/*$bcrypt = new \App\Algorithm\Bcrypt();
$password = new \App\Password('12345678');
$hash = $password->hash($bcrypt);
$var1 = \App\Password::needsRehash($hash, $bcrypt); //false
$var2 = \App\Password::needsRehash($hash, new \App\Algorithm\Argon2i(null, 12)); //true
var_dump($var1);
var_dump($var2);*/


/* Argon2i */

// 1. Хеширование
/*$argon2i = new \App\Algorithm\Argon2i();
$password = new \App\Password('12345678');
$hash = $password->hash($argon2i); //$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE
var_dump($hash);*/

// 2. Проверка хеша
/*$password = new \App\Password('12345678');
$var1 = $password->verify('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE'); //true
$var2 = $password->verify('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE1'); //false
var_dump($var1);
var_dump($var2);*/

// 3. Проверка на соответствие алгоритму
/*$argon2i = new \App\Algorithm\Argon2i();
$var1 = \App\Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE', $argon2i); //false
$var2 = \App\Password::needsRehash('$argon2i$v=19$m=65536,t=4,p=1$SUswbUhUVlM1Y2hYanU4bw$NtYLbns8XMOGeitzNzRoLN8cXcDhvUf9CxL5SOMLYRE1', new \App\Algorithm\Bcrypt(null, 11)); //true
var_dump($var1);
var_dump($var2);*/

/* Argon2id */

// 1. Хеширование
/*$argon2id = new \App\Algorithm\Argon2id();
$password = new \App\Password('12345678');
$hash = $password->hash($argon2id); //$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw
var_dump($hash);*/

// 2. Проверка хеша
/*$password = new \App\Password('12345678');
$var1 = $password->verify('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw'); //true
$var2 = $password->verify('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw1'); //false
var_dump($var1);
var_dump($var2);*/

// 3. Проверка на соответствие алгоритму
/*$argon2id = new \App\Algorithm\Argon2id();
$var1 = \App\Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw', $argon2id); //false
$var2 = \App\Password::needsRehash('$argon2id$v=19$m=65536,t=4,p=1$VUloUnNCM0RkeGxob1R0Tw$JsJTGp2rDhcMdyM1hcHsVZurCGzkMm2ggAvY/CEitJw', new \App\Algorithm\Argon2i(100)); //true
var_dump($var1);
var_dump($var2);*/
