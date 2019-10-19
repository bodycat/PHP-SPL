<!-- 
3.*—оздать PHP-демон, который принимает от пользовател€ сообщени€. —оздать отдельный интерфейс с кнопкой, возвращающей самое старое сообщение на экран и удал€ющее его. Ѕазы данных, файлы и иные хранилища не использовать.
 -->
<?php 
$queue = new SplQueue;
$socket = stream_socket_server("tcp://0.0.0.0:1666");
while ($connection = stream_socket_accept($socket, -1)) {
    fwrite($connection, 'Hello');
    $data = fread($connection, 1024);
    if ($data == 0) {
        $lastMessage = $queue->dequeue();
    } else {
        $queue->enqueue($data);
        fwrite($connection, "\r\ndata saved!\r\n");
    }
    fclose($connection);
}
?> 