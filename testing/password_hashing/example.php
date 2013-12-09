<?php
// Подключаем библиотеку phpass
require_once('phpass-0.3/PasswordHash.php');
  
$hasher = new PasswordHash(8, false);
  
// Хэщируем пароль.  $hashedPassword - строка в 60 символов.
$hashedPassword = $hasher->HashPassword('my super cool password');
  
// Теперь можно сохранить сожержимое $hashedPassword в вашей базе данных!
  
// Проверяем, ввел ли пользователь верный пароль, сравнивая то, что он ввел с нашим хэшем
$hasher->CheckPassword('the wrong password', $hashedPassword); // false
  
$hasher->CheckPassword('my super cool password', $hashedPassword); // true
?>