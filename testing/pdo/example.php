<?php
try{
    // Создаем новое подключение.
    // Параметры PDO которые мы передаем:
    // PDO::ATTR_ERRMODE включает режим исключений при обработке ошибок. Необязательно, но удобно.
    // PDO::ATTR_PERSISTENT Отключает постоянное соединение, которое, в некоторых случаях, может вызвать проблемы. См. "Подводные камни".
    // PDO::MYSQL_ATTR_INIT_COMMAND Уведомляет подключение, что нужно передавать UTF-8 данные. Возможно вам это и не нужно, зависит от вашей конфигурации, но это избавит вас возможных проблем, при сохранении в базу строки UTF-8. См. "Подводные камни".
    $link = new PDO(   'mysql:host=localhost;dbname=dic',
                       'root',
                       '',
                       array(
                           PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                           PDO::ATTR_PERSISTENT => false,
                           PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4'
                        )
                    );
 
    $handle = $link->prepare('select email from users where id = ? or login = ? limit ?');
 
    // PHP bug: Если не задать PDO::PARAM_INT, PDO может обрамить аргументы в кавычки. Это может испортить некоторые запросы, которые не ожидают, что числа будут в кавычках.
    // Подробнее: https://bugs.php.net/bug.php?id=44639
    // Если вы не уверены, что передаете число, используйте функцию is_int().
    $handle->bindValue(1, 1, PDO::PARAM_INT);
    $handle->bindValue(2, 'voffdev');
    $handle->bindValue(3, 5, PDO::PARAM_INT);
 
    $handle->execute();
 
    // Использование метода fetchAll() может быть достаточно тяжелым в плане ресурсов, если вы выбираете большое количество строк.
    // В этом случае, можно использовать метод fetch() и обрабатывать каждую выбранную строку одну за одной.
	$result = $handle->fetchAll(\PDO::FETCH_OBJ);
 
    foreach($result as $row){
        print($row->email);
        echo "\n";
    }
}
catch(PDOException $ex){
    print($ex->getMessage());
}
?>