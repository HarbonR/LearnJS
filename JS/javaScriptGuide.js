//====================================================================================================
/* ------------------------------------Глава 1. Введение в JavaScript--------------------------------- */
// Что такое JavaScript
function whatIsJavaScript()
{
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/JavaScriptGuide/whatIsJavaScript.php');
    xhr.send();
}
//====================================================================================================
/* --------------------------------------Глава 2. Основы javascript----------------------------------- */
// Переменные и константы
function variablesAndConstants()
{
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/JavaScriptGuide/variablesAndConstants.php');
    xhr.send();
}
// Типы данных
function dataTypes()
{
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/JavaScriptGuide/dataTypes.php');
    xhr.send();
}
//====================================================================================================
/* --------------------------------------Глава 2. Основы javascript----------------------------------- */
// Функции
function functions()
{
    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/JavaScriptGuide/functions.php');
    xhr.send();
}
//====================================================================================================