//====================================================================================================
// Переменные

//====================================================================================================
/* -------------------------------------Личный кабинет пользователя----------------------------------- */
// Функция для формирования личного кабинета
function userPersonalAccount()
{
    let personalAccount = document.getElementById("personalAccount");

    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные
            for(let i = 0; i < jsonData.length; i++)
            {
                let scoreForTheTestOnTheTopic = document.createElement("div"); // Оценка за тест по теме
                scoreForTheTestOnTheTopic.style.marginBottom = "5px";
                scoreForTheTestOnTheTopic.textContent = "Оценка за тест по теме: " + jsonData[i].subject + " : ";

                let grade = document.createElement("span"); // Оценка
                grade.style.marginLeft = "5px";
                grade.style.border = "1px solid red";
                grade.style.borderRadius = "50%";
                grade.style.color = "red";
                grade.style.padding = "5px";
                grade.textContent = jsonData[i].testScore;
                scoreForTheTestOnTheTopic.appendChild(grade);

                personalAccount.appendChild(scoreForTheTestOnTheTopic);
            }
            getLaboratoryWorkForPersonalAccount();
        }
    };
    xhr.open("POST", "../PHP/userTest.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
}
//--------------------------------------------------
// Функция для создания лабораторных работ
function createLaboratoryWorkForPersonalAccount(id, subject, userId, labGrade){
    let laboratoryWork = document.createElement("div");

    laboratoryWork.textContent = "Оценка за " + subject + " " + ((labGrade != null) ? ": " : ":");

    let grade = document.createElement("span"); // Оценка
    grade.style.marginLeft = "5px";
    grade.style.border = "1px solid red";
    grade.style.borderRadius = "50%";
    grade.style.color = "red";
    grade.style.padding = "5px";
    grade.textContent = labGrade;
    if(labGrade != null)
        laboratoryWork.appendChild(grade);
    else if(labGrade == null && userId != null)
    {
        grade.textContent = "Загружена";
        laboratoryWork.appendChild(grade);
    }

    let inputDownloadLaboratoryWork = document.createElement("input");
    inputDownloadLaboratoryWork.className = "inputDownloadLaboratoryWork";
    inputDownloadLaboratoryWork.setAttribute("type", "file");

    let buttonDownloadLaboratoryWork = document.createElement("button");
    buttonDownloadLaboratoryWork.className = "buttonDownloadLaboratoryWork";
    buttonDownloadLaboratoryWork.textContent = "Загрузить работу"
    buttonDownloadLaboratoryWork.onclick = function(event){
        event.preventDefault(); // Отмена действий по отправки формы
        let file = inputDownloadLaboratoryWork.files[0]; // Получение выбранного файла
        let formData = new FormData(); // Создание объекта FormData для отправки файла
        formData.append('file', file); // Добавление файла в объект FormData
        formData.append('subject', subject); // Добавление файла в объект FormData
        formData.append('labId', id);
        let xhr = new XMLHttpRequest(); // Создание объекта XMLHttpRequest
        xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта xhr
        {
            if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
            {
                personalArea.click();
            }
        }
        xhr.open('POST', '../PHP/addLaboratoryWork.php', true); // Настройка запроса
        xhr.send(formData); // Отправка запроса
    }

    laboratoryWork.appendChild(inputDownloadLaboratoryWork);
    laboratoryWork.appendChild(buttonDownloadLaboratoryWork);

    return laboratoryWork;
}
//--------------------------------------------------
// Функция для отображения лабораторных работ в личном кабинете
function getLaboratoryWorkForPersonalAccount(){
    let containerForLaboratoryWorks = document.getElementById("containerForLaboratoryWorks");
    // Получение данных о лабораторных работах
    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные
            for(let i = 0; i < jsonData.length; i++)
            {
                let laboratoryWork = createLaboratoryWorkForPersonalAccount(jsonData[i].id, jsonData[i].subject, jsonData[i].userId, jsonData[i].labGrade);
                containerForLaboratoryWorks.appendChild(laboratoryWork);
            }
        }
    };
    xhr.open("POST", "../PHP/laboratoryWork.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
}
//====================================================================================================
/* -------------------------------------Личный кабинет преподавателя---------------------------------- */
// Функция для формирования оценки за тест у добавленных учеников
function userPersonalAccountTestForTeacher(jsonData)
{
    let personalAccount = document.createElement("div");
    personalAccount.style.display = 'flex';
    personalAccount.style.alignItems = 'center';
    personalAccount.style.marginTop = '5px';

    let scoreForTheTestOnTheTopic = document.createElement("div"); // Оценка за тест по теме
    scoreForTheTestOnTheTopic.textContent = "Оценка за тест по теме: " + jsonData.subject + " ";

    let grade = document.createElement("span"); // Оценка
    grade.style.marginLeft = "5px";
    grade.style.border = "1px solid red";
    grade.style.borderRadius = "50%";
    grade.style.color = "red";
    grade.style.padding = "5px";
    grade.textContent = jsonData.testScore;
    scoreForTheTestOnTheTopic.appendChild(grade);

    personalAccount.appendChild(scoreForTheTestOnTheTopic);

    let deleteTest = document.createElement("button");
    deleteTest.className = "buttonTakeTheTest";
    deleteTest.textContent = "Удалить тест";
    deleteTest.onclick = function()
    {
        let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
        xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
        {
            if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
            {
                personalAccount.remove();
            }
        };
        xhr.open("POST", "../PHP/deleteUserTest.php", true); 
        // Отправляем запрос на сервер
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок Content-Type
        xhr.send("userId=" + encodeURIComponent(jsonData.userId) + "&testId=" + encodeURIComponent(jsonData.testId));
    }
    
    personalAccount.appendChild(deleteTest);

    return personalAccount;
}
//--------------------------------------------------
// Функция для формирования оценки за лабораторные работы у добавленных учеников
function userPersonalAccountLaboratoryWorkForTeacher(jsonData)
{
    let personalAccount = document.createElement("div");
    personalAccount.style.marginTop = '5px';

    let labGrade = document.createElement("div"); // Оценка за лабораторные работы
    labGrade.textContent = "Оценка за " + jsonData.subject + " " + ((jsonData.labGrade != null) ? ": " : ":");
    labGrade.style.display = 'flex';
    labGrade.style.alignItems = 'center';

    let grade = document.createElement("span"); // Оценка
    grade.style.marginLeft = "5px";
    grade.style.border = "1px solid red";
    grade.style.borderRadius = "50%";
    grade.style.color = "red";
    grade.style.padding = "5px";
    grade.textContent = jsonData.labGrade;
    if(jsonData.labGrade != null)
        labGrade.appendChild(grade);

    let buttonDownloadLaboratoryWork = document.createElement("button"); // Кнопка для загрузки лабораторной работы ученика
    buttonDownloadLaboratoryWork.className = "buttonDownloadLaboratoryWork";
    buttonDownloadLaboratoryWork.textContent = "Скачать работу";
    buttonDownloadLaboratoryWork.onclick = function()
    {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', jsonData.fileLink, true);
        xhr.responseType = 'blob';
        xhr.onload = function() {
        var url = window.URL.createObjectURL(xhr.response);
        var a = document.createElement('a');
        a.href = url;
        a.download = jsonData.subject; // При загрузке называет файл этим именем
        a.click();
        };
        xhr.send();
    }

    labGrade.appendChild(buttonDownloadLaboratoryWork);

    let inputСhangeRating = document.createElement("input");
    inputСhangeRating.style.marginLeft = "10px";
    inputСhangeRating.style.width = "100px";
    inputСhangeRating.placeholder = "Оценка";

    labGrade.appendChild(inputСhangeRating);

    let buttonСhangeRating = document.createElement("button"); // Кнопка для изменения оценки за лабораторную работу ученика
    buttonСhangeRating.className = "buttonTakeTheTest";
    buttonСhangeRating.textContent = "Изменить оценку";
    buttonСhangeRating.onclick = function()
    {
        let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
        xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
        {
            if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
            {
                personalArea.click();
            }
        };
        xhr.open("POST", "../PHP/labGradeChanges.php", true); 
        // Отправляем запрос на сервер
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок Content-Type
        xhr.send("userId=" + encodeURIComponent(jsonData.userId) + "&labId=" + encodeURIComponent(jsonData.labId) + "&labGrade=" + encodeURIComponent(inputСhangeRating.value));
    }
    
    labGrade.appendChild(buttonСhangeRating);

    personalAccount.appendChild(labGrade);

    return personalAccount;
}
//--------------------------------------------------
// Функция для формирования личного кабинета
function teacherPersonalAccount()
{
    let title = body.getElementsByClassName("title");
    title[0].textContent = "Личный кабинет преподавателя";
    let personalAccount = document.getElementById("personalAccountStudent");

    let form = document.createElement("form");

    let inputAddStudent = document.createElement("input");
    inputAddStudent.style.textAlign = "center";
    inputAddStudent.placeholder = "Введите Id ученика для отслеживания";
    
    let buttonAddStudent = document.createElement("button");
    buttonAddStudent.className = "buttonDownloadLaboratoryWork";
    buttonAddStudent.textContent = "Добавить ученика";
    buttonAddStudent.onclick = function(event)
    {
        event.preventDefault(); // Отмена действий по отправки формы

        let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
        xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
        {
            if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
            {
                if(xhr.responseText == "")
                    personalArea.click();
                else if(xhr.responseText == "Пользователя не существует")
                {
                    inputAddStudent.value = "";
                    inputAddStudent.placeholder = "Такого пользователя не существует";
                }
                else if(xhr.responseText == "Пользователь уже добавлен")
                {
                    inputAddStudent.value = "";
                    inputAddStudent.placeholder = "Такой пользователь уже был добавлен ранее";
                }
        }
        };
        xhr.open("POST", "../PHP/addStudent.php", true); 
        // Отправляем запрос на сервер
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок Content-Type
        xhr.send("userId=" + encodeURIComponent(inputAddStudent.value));
    }

    form.appendChild(inputAddStudent);
    form.appendChild(buttonAddStudent);
    
    //--------------------------------------------------
    // Отображаем личные кабинеты добавленных пользователей
    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные       
            jsonDataTest = jsonData.test;
            jsonDataLaboratoryWork = jsonData.laboratoryWork;
            jsonDataUser = jsonData.user;
            //--------------------------------------------------
            for(let i = 0; i < jsonDataUser.length; i++) // Если данных больше чем один добавить остальных учеников (Имена)
            {
                let nameStudent = document.createElement("div");
                nameStudent.style.borderTop = "1px dashed black";
                nameStudent.style.paddingTop = "5px";
                nameStudent.style.marginTop = "5px";
                nameStudent.textContent = "Ученик: " + "Id: " + jsonDataUser[i].userId + " Name: " + jsonDataUser[i].name;
                nameStudent.id = jsonDataUser[i].userId;
                personalAccount.appendChild(nameStudent);
            }
            //--------------------------------------------------
            for(let i = 0; i < jsonDataTest.length; i++) // Заполнить данные (Тесты) об учениках созданных ранее (Имена)
            {
                let userPersonalAccount = userPersonalAccountTestForTeacher(jsonDataTest[i]);
                let containerPersonalAccount = document.getElementById(jsonDataTest[i].userId);
                containerPersonalAccount.appendChild(userPersonalAccount);
            }
            //--------------------------------------------------
            for(let i = 0; i < jsonDataLaboratoryWork.length; i++) // Заполнить данные (Лабораторные работы) об учениках созданных ранее (Имена)
            {
                let userPersonalAccount = userPersonalAccountLaboratoryWorkForTeacher(jsonDataLaboratoryWork[i]);
                let containerPersonalAccount = document.getElementById(jsonDataLaboratoryWork[i].userId);
                containerPersonalAccount.appendChild(userPersonalAccount);
            }
        }
    };
    xhr.open("POST", "../PHP/userPersonalAreaForTeacher.php", true); 
    xhr.send();

    personalAccount.appendChild(form);
}
//====================================================================================================