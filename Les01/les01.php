<!-- 1. �������� ������ ����������� � Windows ��� ���������� �� ������� ��� ������ ����������.-->
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