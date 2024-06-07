<?php
    session_start();
    if($_SESSION['userEmail'])
    {
        require 'linkDB.php';
        // Создаем подключение
        $Connect = mysqli_connect($serverName, $userName, $password, $dBName);
        // Проверяем подключение
        if (!$Connect)
        {
            die("Ошибка подключения: " . mysqli_connect_error());
        }
        $userId = $_POST['userId'];
        $labId = $_POST['labId'];
        $labGrade = $_POST['labGrade'];

        $sql = "
            UPDATE
                UserLabWork
            SET LabGrade = '$labGrade'
            WHERE
                UserId = '$userId' AND LabId = '$labId'
        "; // SQL запрос
        $result = mysqli_query($Connect, $sql); // выполнение запроса
        mysqli_close($Connect); // Закрываем соединение с базой данных
    }
?>