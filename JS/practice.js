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

    let elementSubject = document.createTextNode(subject);

    let buttonDownloadLaboratoryWork = document.createElement("button");
    buttonDownloadLaboratoryWork.className = "buttonDownloadLaboratoryWork";
    buttonDownloadLaboratoryWork.textContent = "Скачать работу"
    buttonDownloadLaboratoryWork.onclick = function(){
        downloadFileFromServer(fileLink, subject);
    }

    laboratoryWork.appendChild(elementSubject);
    laboratoryWork.appendChild(buttonDownloadLaboratoryWork);

    return laboratoryWork;
}
//--------------------------------------------------
// Функция для создания тестов
function createTest(jsonDataTest, jsonDataQuestion){
    let test = document.createElement("div");

    let elementSubject = document.createTextNode(jsonDataTest.subject);

    let buttonTakeTheTest = document.createElement("button");
    buttonTakeTheTest.className = "buttonTakeTheTest";
    buttonTakeTheTest.textContent = "Пройти тест";
    buttonTakeTheTest.onclick = function(){
        createPassingTheTest(jsonDataTest.id, jsonDataTest.subject, jsonDataQuestion);
    }

    test.appendChild(elementSubject);
    test.appendChild(buttonTakeTheTest);

    return test;
}
//--------------------------------------------------
// Функция для создания прохождения тестов
function createPassingTheTest(testId, subject, jsonDataQuestion) {
    let body = document.getElementById('body');
    body.innerHTML = ""; // Очищаем контейнер перед добавлением новых карточек
  
    let form = document.createElement('form');
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Отменяем отправку формы
  
      // Получаем все выбранные ответы
      let label = form.getElementsByTagName("label");

      // Получаем label внутри которых input имеет checked
      let checkedLabels = Array.from(label).filter(label => {
        let input = label.querySelector('input');
        return input && input.checked;
      });

      let countQuestions = checkedLabels.length;
      let counterCorrectAnswer = 0;

      for(let i = 0; i < jsonDataQuestion.length; i++)
      {
          if(jsonDataQuestion[i].correctAnswer == checkedLabels[i].textContent)
          {
            counterCorrectAnswer++;
          }
      }
      console.log(testId);
      let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHTTPrequest
      xhr.open("POST", "../PHP/userTestAdd.php", true); 
      // Отправляем запрос на сервер
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // Устанавливаем заголовок Content-Type
      xhr.send("testId=" + encodeURIComponent(testId) + "&testScore=" + encodeURIComponent(counterCorrectAnswer * 100 / countQuestions));
    });
  
    let fieldset = document.createElement('fieldset');
    let legend = document.createElement('legend');
    legend.textContent = subject;
    fieldset.appendChild(legend);
  
    for (let i = 0; i < jsonDataQuestion.length; i++) {
      let questionData = jsonDataQuestion[i];
      let question = questionData.question;
      let answers = [
        questionData.correctAnswer,
        questionData.incorrectAnswerOne,
        questionData.incorrectAnswerTwo,
        questionData.incorrectAnswerThree
      ];
  
      let questionElement = document.createElement('div');
      questionElement.id = jsonDataQuestion[i].idQuestion;
      questionElement.className = "questionElement";
      let questionText = document.createElement('p');
      questionText.textContent = question;
      questionElement.appendChild(questionText);
  
      for (let j = 0; j < answers.length; j++) {
        let label = document.createElement('label');
        let input = document.createElement('input');
        input.type = 'radio';
        input.name = 'question' + (i + 1);
        input.value = 'option' + (j + 1);
        label.appendChild(input);
        label.appendChild(document.createTextNode(answers[j]));
        questionElement.appendChild(label);
      }
  
      fieldset.appendChild(questionElement);
    }
  
    let submitButton = document.createElement('button');
    submitButton.type = 'submit';
    submitButton.textContent = 'Отправить';
    fieldset.appendChild(submitButton);
  
    form.appendChild(fieldset);
  
    body.appendChild(form);
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
// Функция для отображения тестов
function getTest(){
    let containerForTests = document.getElementById("containerForTests");
    // Получение данных о тестах
    let xhr = new XMLHttpRequest(); // Создаем новый объект XMLHttpRequest
    xhr.onreadystatechange = function() // Устанавливаем функцию, которая будет вызываться при изменении состояния объекта `xhr`
    {
        if (xhr.readyState === 4 && xhr.status === 200) // Проверяем, что запрос завершен и успешен
        {
            let jsonData = JSON.parse(xhr.responseText); // Разбираем JSON-данные
            let jsonDataTest = jsonData.test;
            let jsonDataQuestion = jsonData.question;
            for(let i = 0; i < jsonDataTest.length; i++)
            {
                let test = createTest(jsonDataTest[i], jsonDataQuestion);
                containerForTests.appendChild(test);
            }
        }
    };
    xhr.open("POST", "../PHP/test.php"); // Открываем соединение с сервером с помощью метода "POST" и адреса ""
    xhr.send(); // Отправляем запрос на сервер
}
//====================================================================================================