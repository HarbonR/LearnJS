//====================================================================================================
// Переменные

//====================================================================================================
/* -------------------------------------Личный кабинет пользователя----------------------------------- */
// Функция для формирования личного кабинета
function userPersonalAccount()
{
    let personalAccount = document.getElementById("personalAccount");
    let сourseProgress = document.createElement("div");
    // сourseProgress.textContent = "Курс пройден на " + "";

    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные
            for(let i = 0; i < jsonData.length; i++)
            {
                let scoreForTheTestOnTheTopic = document.createElement("div"); // Оценка за тест по теме
                scoreForTheTestOnTheTopic.textContent = "Оценка за тест по теме: " + jsonData[i].subject + " " + jsonData[i].testScore + "%";
                personalAccount.appendChild(scoreForTheTestOnTheTopic);
            }
            getLaboratoryWorkForPersonalAccount();
        }
    };
    xhr.open("POST", "../PHP/userTest.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
    
    // personalAccount.appendChild(сourseProgress);
}
//--------------------------------------------------
// Функция для создания лабораторных работ
function createLaboratoryWorkForPersonalAccount(subject, fileLink){
    let laboratoryWork = document.createElement("div");

    let elementSubject = document.createTextNode(subject);

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
        let xhr = new XMLHttpRequest(); // Создание объекта XMLHttpRequest
        xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта xhr
        {
            if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
            {

            }
        }
        xhr.open('POST', '../PHP/addLaboratoryWork.php', true); // Настройка запроса
        xhr.send(formData); // Отправка запроса
    }

    laboratoryWork.appendChild(elementSubject);
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
                let laboratoryWork = createLaboratoryWorkForPersonalAccount(jsonData[i].subject, jsonData[i].fileLink);
                containerForLaboratoryWorks.appendChild(laboratoryWork);
            }
        }
    };
    xhr.open("POST", "../PHP/laboratoryWork.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
}
//====================================================================================================
/* -------------------------------------Личный кабинет преподавателя---------------------------------- */
// Функция для формирования личного кабинета
function teacherPersonalAccount()
{
    let personalAccount = document.getElementById("personalAccount");
    let сourseProgress = document.createElement("div");
    // сourseProgress.textContent = "Курс пройден на " + "";

    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные
            for(let i = 0; i < jsonData.length; i++)
            {
                let scoreForTheTestOnTheTopic = document.createElement("div"); // Оценка за тест по теме
                scoreForTheTestOnTheTopic.textContent = "Оценка за тест по теме: " + jsonData[i].subject + " " + jsonData[i].testScore + "%";
                personalAccount.appendChild(scoreForTheTestOnTheTopic);
            }
            getLaboratoryWorkForPersonalAccount();
        }
    };
    xhr.open("POST", "../PHP/userTest.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
    
    // personalAccount.appendChild(сourseProgress);
}
//====================================================================================================