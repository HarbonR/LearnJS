<?php
    session_start();
    if($_SESSION['userEmail'])
    {
        $data = array(); // Создаем пустой массив для хранения данных
        $data = ['userName' => $_SESSION['userName'], 'userId' => $_SESSION['userId'], 'teacher' => $_SESSION['teacher']];
        $jsonData = json_encode($data); // Преобразуем массив в формат JSON
        echo $jsonData; // Отправляем JSON-данные в JavaScript
    }
?>