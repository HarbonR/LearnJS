<?php
    session_start();
    require 'linkDB.php';
    // Создаем подключение
    $Connect = mysqli_connect($serverName, $userName, $password, $dBName);
    // Проверяем подключение
    if (!$Connect)
    {
        die("Ошибка подключения: " . mysqli_connect_error());
    }
    $userId = $_SESSION['userId'];
    $sql = "
        SELECT
            LaboratoryWork.Id 
            ,LaboratoryWork.Subject
            ,LaboratoryWork.FileLink
            ,UserLabWork.UserId
            ,UserLabWork.LabGrade
        FROM
            LaboratoryWork
        LEFT JOIN UserLabWork ON UserLabWork.LabId = LaboratoryWork.Id AND UserLabWork.UserId = '$userId'
            "; // SQL запрос
    $result = mysqli_query($Connect, $sql); // выполнение запроса
    $data = array(); // Создаем пустой массив для хранения данных

    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) // выводим данные из каждой строки
        {
            $data[] = array(
                'id' => $row['Id'],
                'subject' => $row['Subject'],
                'fileLink' => $row['FileLink'],
                'userId' => $row['UserId'],
                'labGrade' => $row['LabGrade']
            );
        }
    }
    $jsonData = json_encode($data); // Преобразуем массив в формат JSON
    echo $jsonData; // Отправляем JSON-данные в JavaScript
    mysqli_close($Connect); // Закрываем соединение с базой данных
?>