<?php

$servername = 'localhost';
$database = 'my_database';
$login = 'root';
$password = '';

$conn = mysqli_connect($servername, $login, $password, $database);

if(!$conn) {
    die('Ошибка: ' . mysqli_connect_error());
}

echo 'Соединение с базой данных установлено! <hr>';