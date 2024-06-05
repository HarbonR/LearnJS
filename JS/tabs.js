//====================================================================================================
// Переменные
let logo = document.getElementById("logo");
let javaScriptGuide = document.getElementById("javaScriptGuide");
let practice = document.getElementById("practice");
let aboutTheSite = document.getElementById("aboutTheSite");
let personalArea = document.getElementById("personalArea");
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
    javaScriptGuide.classList.remove("menuActive");
    personalArea.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/homePage.php');
    xhr.send();
}
//====================================================================================================
// Основы JavaSript
javaScriptGuide.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptGuide.classList.add("menuActive");
    personalArea.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/javaScriptGuide.php');
    xhr.send();
}
//====================================================================================================
// Практика
practice.onclick = function(){

    practice.classList.add("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptGuide.classList.remove("menuActive");
    personalArea.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
        getLaboratoryWork();
    };
    xhr.open('GET', '../Pages/practice.php');
    xhr.send();
}
//====================================================================================================
// О сайте
aboutTheSite.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.add("menuActive");
    javaScriptGuide.classList.remove("menuActive");
    personalArea.classList.remove("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/aboutTheSite.php');
    xhr.send();
}
//====================================================================================================
// Личный кабинет
personalArea.onclick = function(){

    practice.classList.remove("menuActive");
    aboutTheSite.classList.remove("menuActive");
    javaScriptGuide.classList.remove("menuActive");
    personalArea.classList.add("menuActive");

    var xhr = new XMLHttpRequest();
    xhr.onload = function() {
        body.innerHTML = this.responseText;
    };
    xhr.open('GET', '../Pages/personalArea.php');
    xhr.send();
}
//====================================================================================================
