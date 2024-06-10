//====================================================================================================
/* ------------------------------------Глава 1. Введение в JavaScript--------------------------------- */
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