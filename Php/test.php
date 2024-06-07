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
            Test.Id
            ,Test.Subject
            ,UserTest.TestScore
        FROM
            Test
        LEFT JOIN UserTest ON UserTest.TestId = Test.id AND UserTest.UserId = '$userId'
        "; 
    $result1 = mysqli_query($Connect, $sql1); 
    $data1 = array(); 
    if (mysqli_num_rows($result1) > 0) 
    {
        while($row1 = mysqli_fetch_assoc($result1)) 
        {
            $data1[] = array(
                'id' => $row1['Id'],
                'subject' => $row1['Subject'],
                'testScore' => $row1['TestScore'],
            );
        }
    }
    // Запрос ко второй таблице
    $sql2 = "
        SELECT
            TestId
            ,Test.Subject
            ,QuestionId
            ,Question.Question
            ,Question.CorrectAnswer
            ,Question.IncorrectAnswerOne
            ,Question.IncorrectAnswerTwo
            ,Question.IncorrectAnswerThree
        FROM
            TestLog
        INNER JOIN Test ON TestLog.TestId = Test.Id
        INNER JOIN Question ON TestLog.QuestionId = Question.Id
        "; 
    $result2 = mysqli_query($Connect, $sql2); 
    $data2 = array(); 
    if (mysqli_num_rows($result2) > 0) 
    {
        while($row2 = mysqli_fetch_assoc($result2)) 
        {
            $data2[] = array(
                'idTest' => $row2['TestId'],
                'subject' => $row2['Subject'],
                'idQuestion' => $row2['QuestionId'],
                'question' => $row2['Question'],
                'correctAnswer' => $row2['CorrectAnswer'],
                'incorrectAnswerOne' => $row2['IncorrectAnswerOne'],
                'incorrectAnswerTwo' => $row2['IncorrectAnswerTwo'],
                'incorrectAnswerThree' => $row2['IncorrectAnswerThree']
            );
        }
    }
    // Объединяем данные из двух таблиц в один массив
    $data = array(
        'test' => $data1,
        'question' => $data2
    );
    $jsonData = json_encode($data); // Преобразуем массив в формат JSON
    echo $jsonData; // Отправляем JSON-данные в JavaScript
    mysqli_close($Connect); // Закрываем соединение с базой данных
?>