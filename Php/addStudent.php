<?php
    session_start();
    if ($_SESSION['userEmail']) {
        require 'linkDB.php';
        // Создаем подключение
        $Connect = mysqli_connect($serverName, $userName, $password, $dBName);
        // Проверяем подключение
        if (!$Connect) {
            die("Ошибка подключения: " . mysqli_connect_error());
        }
        $teacherId = $_SESSION['userId'];
        $userId = $_POST['userId'];

        // Проверяем, существует ли запись с указанным UserId
        $sql1 = "SELECT * FROM User WHERE Id = '$userId'";
        $result1 = mysqli_query($Connect, $sql1);
        if (mysqli_num_rows($result1) > 0) // Запись существует, 
        {
            // Проверяем, был ли добавлен ранее пользователь с указанным UserId
            $sql2 = "SELECT * FROM TeacherUser WHERE UserId = '$userId'";
            $result2 = mysqli_query($Connect, $sql2);
            if (mysqli_num_rows($result2) > 0) // Запись существует, 
            {   
                echo 'Пользователь уже добавлен';
            }
            else
            {
                $sql3 = "INSERT INTO TeacherUser (TeacherId, UserId) VALUES ('$teacherId', '$userId')"; // SQL запрос
                $result3 = mysqli_query($Connect, $sql3); // выполнение запроса
            }            
        }
        else
        {
            echo 'Пользователя не существует'; // Запись не существует, показываем ошибку
        }
        mysqli_close($Connect); // Закрываем соединение с базой данных
    }
?>