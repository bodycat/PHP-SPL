<?php
include( 'merge-sort.php' );
//произвольный массив для сортировки
$array1=[];
while ($key <= 10) {
	$array1[$key+1]=rand(0,10);
	$key++;
}
$array=$array1;
//выполняем сортировку слиянием
$array = bb_merge_sort( $array ); 
//приводим к строке, выводим
echo 'Сортируем массив методом слияния: ';
foreach ($array1 as $key => $value) {
	print($value.' ');
	print(PHP_EOL);
}
?>
<br>
Получилось: <?php echo implode(', ', $array ); ?>

<!-- Сортируем массив методом слияния: 1 5 5 8 9 10 6 0 9 0 3
Получилось: 0, 0, 1, 3, 5, 5, 6, 8, 9, 9, 10 -->