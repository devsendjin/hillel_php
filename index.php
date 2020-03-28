<?php
//declare(strict_types=1);

use App\Currency;
use App\Money;

require_once 'vendor/autoload.php';

$uah = new Currency('UAH');
$usd = new Currency('USD');

//equality
var_dump($uah->equals($usd));

$uahAmount = new Money(5, $uah);
$uahAmount1 = new Money(10, $uah);
$usdAmount = new Money(20, $usd);
$usdAmount1 = new Money(30, $usd);
$usdAmount2 = new Money(40, $usd);

echo '<p>fullName</p>';
echo Money::fullName($uahAmount);
echo '<br>';
echo Money::fullName($usdAmount);
echo '<br>';

//equality UAH
echo '<p>equality UAH</p>';
var_dump($uahAmount->equals($uahAmount1));
echo '<br>';

//equality USD
echo '<p>equality USD</p>';
var_dump($usdAmount->equals($usdAmount1));
echo '<br>';

//sum USD
echo '<p>sum USD</p>';
echo $usdAmount->add([$usdAmount1, $usdAmount2]);
echo '<br>';

//sum UAH
echo '<p>sum UAH</p>';
echo $uahAmount->add([$uahAmount1]);
echo '<br>';
