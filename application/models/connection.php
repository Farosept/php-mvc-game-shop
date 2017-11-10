<?php
$host = 'localhost:3306'; // адрес сервера 
$database = 'gameshop'; // имя базы данных
$charset = "utf8";
$user = 'root'; // имя пользователя
$password = ''; // пароль
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
?>