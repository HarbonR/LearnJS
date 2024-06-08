<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $userId = $_SESSION['userId']; // Id пользователя
        $labId = $_POST['labId'];
        $file = $_FILES['file']; // Получение загруженного файла
        $subject = $_POST['subject'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION); // Получаем расширение загружаемого файла
        $path = dirname(__DIR__).'/Users/'.$userId.'/'.$subject.'.'.$extension; // Создаём путь до лабораторной работы
        // Сохранение лабораторной работы на сервере
        if(move_uploaded_file($file['tmp_name'], $path))
        {
            require 'linkDB.php';
            // Создаем подключение
            $Connect = mysqli_connect($serverName, $userName, $password, $dBName);
            // Проверяем подключение
            if (!$Connect)
            {
                die("Ошибка подключения: " . mysqli_connect_error());
            }

            $sql1 = "
                SELECT
                    *
                FROM
                    UserLabWork
                WHERE
                    UserId = '$userId' AND LabId = '$labId'
            "; // SQL запрос
            $result1 = mysqli_query($Connect, $sql1); // выполнение запроса

            if (mysqli_num_rows($result1) > 0) // Запись существует, 
            {
                $sql2 = "
                    UPDATE UserLabWork 
                    SET 
                        LabGrade = NULL
                    WHERE
                        UserId = '$userId' AND LabId = '$labId'
                "; // SQL запрос
                $result2 = mysqli_query($Connect, $sql2); // выполнение запроса
            }
            else
            {
                $path = '/Users/'.$userId.'/'.$subject.'.'.$extension; // Создаём путь до лабораторной работы
                $sql2 = "INSERT INTO UserLabWork (UserId, LabId, FileLink) VALUES ('$userId', '$labId', '$path')"; // SQL запрос
                $result2 = mysqli_query($Connect, $sql2); // выполнение запроса
            }

            mysqli_close($Connect); // Закрываем соединение с базой данных
        }
    }
?>