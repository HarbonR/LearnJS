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
    // Запрос к первой таблице
    $sql1 = "
        SELECT
            User.Id
            ,Name
            ,UserTest.TestId
            ,Test.Subject
            ,UserTest.TestScore
        FROM
            TeacherUser
        INNER JOIN User ON User.Id = TeacherUser.UserId
        INNER JOIN UserTest ON UserTest.UserId = TeacherUser.UserId
        INNER JOIN Test ON UserTest.TestId = Test.Id
        WHERE
            TeacherUser.TeacherId = '$userId'
        ORDER BY
	        TeacherUser.UserId"; // SQL запрос
    $result1 = mysqli_query($Connect, $sql1); 
    $data1 = array(); 
    if (mysqli_num_rows($result1) > 0) 
    {
        while($row1 = mysqli_fetch_assoc($result1)) 
        {
            $data1[] = array(
                'userId' => $row1['Id'],
                'name' => $row1['Name'],
                'testId' => $row1['TestId'],
                'subject' => $row1['Subject'],
                'testScore' => $row1['TestScore']
            );
        }
    }
    // Запрос ко второй таблице
    $sql2 = "
        SELECT
            UserLabWork.LabId
            ,TeacherUser.UserId
            ,LaboratoryWork.Subject
            ,UserLabWork.LabGrade
            ,UserLabWork.FileLink
        FROM
            TeacherUser
        INNER JOIN UserLabWork ON UserLabWork.UserId = TeacherUser.UserId
        INNER JOIN LaboratoryWork ON LaboratoryWork.Id = UserLabWork.LabId
        WHERE
            TeacherUser.TeacherId = '$userId'"; // SQL запрос
    $result2 = mysqli_query($Connect, $sql2); 
    $data2 = array(); 
    if (mysqli_num_rows($result2) > 0) 
    {
        while($row2 = mysqli_fetch_assoc($result2)) 
        {
            $data2[] = array(
                'labId' => $row2['LabId'],
                'userId' => $row2['UserId'],
                'subject' => $row2['Subject'],
                'labGrade' => $row2['LabGrade'],
                'fileLink' => $row2['FileLink']
            );
        }
    }
    // Объединяем данные из двух таблиц в один массив
    $data = array(
        'test' => $data1,
        'laboratoryWork' => $data2
    );
    $jsonData = json_encode($data); // Преобразуем массив в формат JSON
    echo $jsonData; // Отправляем JSON-данные в JavaScript
    mysqli_close($Connect); // Закрываем соединение с базой данных
?>