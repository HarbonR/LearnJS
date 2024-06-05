//====================================================================================================
// Переменные
//====================================================================================================
// Функция для загрузки файла с сервера
function downloadFileFromServer(path, nameFile){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', path, true);
    xhr.responseType = 'blob';
    xhr.onload = function() {
    var url = window.URL.createObjectURL(xhr.response);
    var a = document.createElement('a');
    a.href = url;
    a.download = nameFile;
    a.click();
    };
    xhr.send();
}
/* ==================================================================================================== */
/* -----------------------------------------------Создание--------------------------------------------- */
// Функция для создания лабораторных работ
function createLaboratoryWork(subject, fileLink){
    let laboratoryWork = document.createElement("div");

    let svgVar = document.createElement("img");
    svgVar.className = "var";
    svgVar.src = "/Picture/Variable.svg";

    let elementSubject = document.createTextNode(subject);

    let buttonDownloadLaboratoryWork = document.createElement("button");
    buttonDownloadLaboratoryWork.className = "buttonDownloadLaboratoryWork";
    buttonDownloadLaboratoryWork.textContent = "Скачать работу"
    buttonDownloadLaboratoryWork.onclick = function(){
        downloadFileFromServer(fileLink, subject);
    }

    laboratoryWork.appendChild(svgVar);
    laboratoryWork.appendChild(elementSubject);
    laboratoryWork.appendChild(buttonDownloadLaboratoryWork);

    return laboratoryWork;
}
/* ==================================================================================================== */
/* ----------------------------------------------Отображение------------------------------------------- */
// Функция для отображения лабораторных работ
function getLaboratoryWork(){
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
                let laboratoryWork = createLaboratoryWork(jsonData[i].subject, jsonData[i].fileLink);
                containerForLaboratoryWorks.appendChild(laboratoryWork);
            }
        }
    };
    xhr.open("POST", "../PHP/laboratoryWork.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
}
//====================================================================================================