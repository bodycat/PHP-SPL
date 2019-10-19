<!-- 1. Написать аналог «Проводника» в Windows для директорий на сервере при помощи итераторов.-->
<?php 
if (empty($_GET['dir'])) {
    $path = '/';
} else {
    $path = $_GET['dir'] . '/';
}

$dir = new DirectoryIterator($path);
foreach ($dir as $item) {
    echo "<a href='Les02.php?dir=$path$item'>$item</a><br>";
}
?>