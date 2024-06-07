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
            $path = '/Users/'.$userId.'/'.$subject.'.'.$extension; // Создаём путь до лабораторной работы
            $sql = "INSERT INTO UserLabWork (UserId, LabId, FileLink) VALUES ('$userId', '$labId', '$path')"; // SQL запрос
            $result = mysqli_query($Connect, $sql); // выполнение запроса
            mysqli_close($Connect); // Закрываем соединение с базой данных
        }
    }
?>