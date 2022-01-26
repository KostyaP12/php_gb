<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
$a = 0;
while ($a <= 100) {
    if ($a % 3 == 0 && $a != 0) {
        echo $a . '<br>';
    }
    $a++;
}
/*2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/
$a = 0;
do {
    switch ($a) {
        case $a == 0:
            echo $a . " - ноль." . '<br>';
            $a++;
            break;
        case $a % 2 == 1:
            echo $a . " - нечетное число." . '<br>';
            $a++;
            break;
        case $a % 2 == 0:
            echo $a . " - четное число." . '<br>';
            $a++;
            break;
    }
} while ($a <= 10);
/*3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений
– массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин.
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт.
Рязанская область … (названия городов можно найти на maps.yandex.ru) строго соблюдать формат вывода выше, т.е. двоеточие и точка в конце*/
$arr = ["Московская область" => ["Москва", "Зеленоград", "Клин"],
    "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
    "Рязанская область" => ["Рязань", "Сасово", "Скопин"]];
foreach ($arr as $key => $value) {
    echo $key . ":<br>";
    if (is_array($value)) {
        foreach ($value as $keyTown => $town) {
            echo((count($value) - 1 == $keyTown) ? $town . "." : $town . ", ");
        }
        echo "<br>";
    }
}
/*4. Объявить массив, индексами которого являются буквы русского языка, а значениями –
соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. Она должна учитывать и заглавные буквы.*/
$alfabet = [
    'а' => 'a', 'б' => 'b', 'в' => 'v',
    'г' => 'g', 'д' => 'd', 'е' => 'e',
    'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
    'и' => 'i', 'й' => 'y', 'к' => 'k',
    'л' => 'l', 'м' => 'm', 'н' => 'n',
    'о' => 'o', 'п' => 'p', 'р' => 'r',
    'с' => 's', 'т' => 't', 'у' => 'u',
    'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
    'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
    'э' => 'e', 'ю' => 'yu', 'я' => 'ya'
];
$word = "Привет, как дела? ";
$result = translate($word, $alfabet);
echo $result;
function translate(string $word, array $alfabet): string
{
    $coincidenceFlag = false;
    $upperFlag = true;
    $letter = " ";
    $result = " ";
    for ($i = 0; $i <= mb_strlen($word); $i++) {
        $letter = mb_substr($word, $i, 1);
        (mb_strtolower($letter, 'utf-8') != $letter) ? $upperFlag = true : $upperFlag = false;
        foreach ($alfabet as $key => $value) {
            if ($key == mb_strtolower($letter)) {
                ($upperFlag) ? $result .= strtoupper($value) : $result .= $value;
                $coincidenceFlag = true;
                break;
            } else $coincidenceFlag = false;
        }
        if ($coincidenceFlag == false) $result .= $letter;
    }
    return $result;
}
/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. Можно через str_replace*/
$result = replacingSpaces($word);
echo $result;
function replacingSpaces (string $phrase): string
{
    $result = " ";
    for ($i = 0; $i <= mb_strlen($phrase); $i++){
        $symbol = mb_substr($phrase, $i, 1);
        ($symbol == " ")? $result .= "_" : $result .= $symbol;
    }
    return $result;
}
/*7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так: for (…){ // здесь пусто}*/
for($i = 0; $i <= 9; print_r($i++)){ }
echo "<br>";

/*8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».*/
foreach ($arr as $key => $value) {
    echo $key . ":<br>";
    if (is_array($value)) {
        foreach ($value as $keyTown => $town) {
            if(mb_substr($town, 0, 1) == "К")echo $town;
        }
        echo "<br>";
    }
}
/*9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания
(аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).*/
echo twoInOne($word, $alfabet);
function twoInOne (string $phrase, array $alfabet):string{
    $resultTranslate = translate($phrase, $alfabet);
    return replacingSpaces($resultTranslate);
}