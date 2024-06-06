<?php
    session_start();  // Инициализация сессии для сохранения данных между запросами
    if($_SERVER['REQUEST_METHOD'] == 'POST') // Проверка, что HTTP-запрос - это POST
    {
        require 'linkDB.php'; // Шаблон данных для подключения к БД
        $Connect = mysqli_connect($serverName, $userName, $password, $dBName); // Создание соединения с базой данных MySQL
        if(!$Connect) // Проверка успешности соединения
        {
            die('Ошибка подключения: ' . mysqli_connect_error()); // Если соединиться не удалось, показать ошибку
        }
        $userEmail = $_POST['userEmail'];  // Принимаем е-мейл из POST-запроса
        $userEmail = mb_strtolower($userEmail, 'UTF-8');  // Переводим email в нижний регистр
        $userPassword = $_POST['userPassword']; // Принимаем пароль из POST-запроса
        
        $userEmail  = mysqli_real_escape_string($Connect, $userEmail); // Экранирование специальных символов в строке для использования в SQL-запросе
        $userPassword  = mysqli_real_escape_string($Connect, $userPassword); // То же самое для пароля
        $sql = 'SELECT Id, Name, Email, Teacher, Password FROM User'; // SQL-запрос на выборку имени, е-мейла и пароля из таблицы пользователей
        $result = mysqli_query($Connect, $sql); // Выполнение SQL-запроса
        if ($result) // Проверка на успешность выполнения запроса
        {
            $booleanUserEmail = false; // Флаг, найден ли е-мейл в базе
            $booleanUserPassword = false; // Флаг, верифицирован ли пароль
            while ($row = mysqli_fetch_assoc($result)) // Перебираем результаты запроса
            {
                if($row['Email'] == $userEmail) // Проверка на совпадение е-мейла
                {
                    $booleanUserEmail = true; // е-мейл найден
                    if(password_verify($userPassword, $row['Password'])) // Проверка хеша пароля
                    {
                        $booleanUserPassword = true; // Пароль верифицирован
                        $_SESSION['userId'] = $row['Id']; // Сохраняем id пользователя в сессии
                        $_SESSION['userName'] = $row['Name']; // Сохраняем имя в сессии
                        $_SESSION['teacher'] = $row['Teacher']; // Сохраняем учитель ли пользователь в сессии
                    }
                }
            }
            if($booleanUserEmail) // Если е-мейл найден
            {
                if($booleanUserPassword) // Если пароль верный
                {
                    $_SESSION['userEmail'] = $userEmail; // Сохраняем е-мейл пользователя в сессии
                    $data = ['answer' => 'Правильный логин и пароль', 'userName' => $_SESSION['userName'], 'userId' => $_SESSION['userId'], 'teacher' => $_SESSION['teacher']];
                    $jsonData = json_encode($data); // Преобразуем массив в формат JSON
                    echo $jsonData; // Отправляем JSON-данные в JavaScript
                }
                else
                {
                    $data = ['answer' => 'Не правильный пароль'];
                    $jsonData = json_encode($data); // Преобразуем массив в формат JSON
                    echo $jsonData; // Отправляем JSON-данные в JavaScript
                }
            }
            else
            {
                $data = ['answer' => 'Не правильный логин и пароль'];
                $jsonData = json_encode($data); // Преобразуем массив в формат JSON
                echo $jsonData; // Отправляем JSON-данные в JavaScript
            }
        }
        else
        {
            $data = ['answer' => 'Ошибка: ' . mysqli_error($Connect)];
            $jsonData = json_encode($data); // Преобразуем массив в формат JSON
            echo $jsonData; // Отправляем JSON-данные в JavaScript
        }
        mysqli_close($Connect); // Закрываем соединение с базой данных
    }
?>