<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $userId = $_SESSION['userId']; // Id пользователя
        $file = $_FILES['file']; // Получение загруженного файла
        $subject = $_POST['subject'];
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION); // Получаем расширение загружаемого файла
        $path = dirname(__DIR__).'/Users/'.$userId.'/'.$subject.'.'.$extension; // Создаём путь до лабораторной работы
        // Сохранение лабораторной работы на сервере
        move_uploaded_file($file['tmp_name'], $path);
    }
?>