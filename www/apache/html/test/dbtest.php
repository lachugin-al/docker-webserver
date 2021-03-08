<?php
// открываем новое соединение
$mysqli = new mysqli(
    'mysql',  // хост в сети
    'root',   // пользователь
    'qwerty', // пароль
    'mysql'   // база данных
);
// если произошла ошибка
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

// выполняем запрос к БД
$results = $mysqli->query("SELECT `User`, `Host` FROM `user` WHERE 1");
// выводим результат запроса
echo '<table border="1">';
while($row = $results->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$row['User'].'</td>';
    echo '<td>'.$row['Host'].'</td>';
    echo '</tr>';
}
echo '</table>';

// освобождаем память
$results->free();
// закрываем соединение
$mysqli->close();