<!-- 
2. Попробовать определить, на каком объеме данных применение итераторов становится выгоднее, чем использование чистого foreach.
 -->
<?php 
$myArray = array();
for ($i = 0; $i < 1000000; $i++) {
    $myArray[] = "item$i";
}

$timeArray1 = time();
echo "$timeArray1<br>";

foreach ($myArray as $value) {
    $a = md5($value);
}

$timeArray2 = time();
echo "$timeArray2<br>";

$iter = new ArrayIterator($myArray);
while($iter->valid()) {
    $b = md5($iter->current());
    $iter->next();
}

$timeArray3 = time();
echo "$timeArray3<br>";

$timeArray = $timeArray2 - $timeArray1;
$timeIter = $timeArray3 - $timeArray2;

echo "<p>Время выполнения foreach $timeArray </p><br>";
echo "<p>Время выполнения итератора $timeIter </p><br>";
?>


<!-- https://clite.ru/articles/php/examples/getting-a-list-of-files-and-directories-with-php/ -->