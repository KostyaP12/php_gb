<?php
/*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести а и б положительные;
если $а и $b отрицательные, вывести а и б отрицательные;
если $а и $b разных знаков, вывести а и б разных знаков;
Ноль можно считать положительным числом.*/
$a = rand(-10, 10);
$b = rand(-10, 10);
echo "Задание 1 <br>";
var_dump($a, $b);
echo "<br>";
if($a >= 0){
    if($b >= 0){
        echo ("а и б положительные");
    }
    else{
        echo ("а и б разных знаков");
    }
}else{
    if($b < 0){
        echo ("а и б отрицательные");
    }else{
        echo ("а и б разных знаков");
    }
}
/*2. Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.
При желании сделайте это задание через рекурсию.*/
echo "<br>";
echo "Задание 2 <br>";
$a = rand(0, 15);
var_dump($a);
switch ($a){
    case 0;
    echo "0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15";
    break;
    case 1;
        echo "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15";
        break;
    case 2;
        echo "2,3,4,5,6,7,8,9,10,11,12,13,14,15";
        break;
    case 3;
        echo "3,4,5,6,7,8,9,10,11,12,13,14,15";
        break;
    case 4;
        echo "4,5,6,7,8,9,10,11,12,13,14,15";
        break;
    case 5;
        echo "5,6,7,8,9,10,11,12,13,14,15";
        break;
    case 6;
        echo "6,7,8,9,10,11,12,13,14,15";
        break;
    case 7;
        echo "7,8,9,10,11,12,13,14,15";
        break;
    case 8;
        echo "8,9,10,11,12,13,14,15";
        break;
    case 9;
        echo "9,10,11,12,13,14,15";
        break;
    case 10;
        echo "10,11,12,13,14,15";
        break;
    case 11;
        echo "11,12,13,14,15";
        break;
    case 12;
        echo "12,13,14,15";
        break;
    case 13;
        echo "13,14,15";
        break;
    case 14;
        echo "14,15";
        break;
    case 15;
        echo "15";
        break;
}
echo "<br>";
recursion($a);
function recursion (int $a){
    if($a < 15){
        echo $a++ . ",";
        recursion($a);
    }
    else{
        echo $a;
    }
}
echo "<br>";
echo "Задание 3 <br>";
/*3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return.
В делении проверьте деление на 0 и верните текст ошибки.*/
$a = rand(-100, 100);
$b = rand(-100, 100);
var_dump($a, $b);
echo "<br>";
$sum = sum($a,$b);
$difference = difference($a, $b);
$product = product($a, $b);
$quotient = quotient($a, $b);
echo $sum . "<br>" . $difference . "<br>" . $product . "<br>" . $quotient . "<br>";
function sum(int $a, int $b):int{
    return $a + $b;
}
function difference(int $a, int $b):int{
    return $a - $b;
}
function product(int $a, int $b):int{
    return $a * $b;
}
function quotient(int $a, int $b):float{
    if ($b){
        return round($a / $b, 3);
    } else{
        echo "На ноль делить нельзя";
        return 0;
    }
}
/*4. Реализовать функцию с тремя параметрами:
function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов,
$operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/
echo "Задание 4 <br>" ;;
echo mathOperation($a, $b, "product");
function mathOperation(int $arg1, int $arg2, string $operation){
    switch ($operation){
        case "sum":
            return sum($arg1, $arg2);
        case "difference":
            return difference($arg1, $arg2);
        case "product":
            return product($arg1, $arg2);
        case "quotient":
            return quotient($arg1, $arg2);
        default:
            echo "Не правильная операция";
            return 0;
    }
}