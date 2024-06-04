//====================================================================================================
// Переменные
let logo = document.getElementById("logo");
let javaScriptBasics = document.getElementById("javaScriptBasics");
let practice = document.getElementById("practice");
let aboutTheSite = document.getElementById("aboutTheSite");
//====================================================================================================
// Функция срабатывает при загрузке страницы
window.addEventListener('load', function()
{
    logo.click();
});
//====================================================================================================
// Лого
logo.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptBasics.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/homePage.php');
    xhr.send();
}
//====================================================================================================
// Основы JavaSript
javaScriptBasics.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptBasics.classList.add("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/javaScriptBasics.php');
    xhr.send();
}
//====================================================================================================
// Практика
practice.onclick = function(){

    practice.classList.add("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptBasics.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/practice.php');
    xhr.send();
}
//====================================================================================================
// О сайте
aboutTheSite.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.add("menuActive");
    javaScriptBasics.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/aboutTheSite.php');
    xhr.send();
}
//====================================================================================================
