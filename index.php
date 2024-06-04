<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnJS</title>
    <link rel="icon" href="favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="/Style/body.css">
    <link rel="stylesheet" href="/Style/general.css">
    <link rel="stylesheet" href="/Style/menu.css">
    <link rel="stylesheet" href="/Style/enterRegister.css">
</head>
<body>
    <div id="enter-register" style="display: none;">
        <div id="form-enter">
            <div id="enter-register_exit-enter">
                <img src="/Picture/Exit.svg" alt="exit">
            </div>
            <h1>
                Вход
            </h1>
            <form id="form-form-enter">
                <label for="email-input">
                    E-mail
                </label>
                <input type="email" name="userEmail" id="email-input" autocomplete="off">
                <label for="password-input">
                    Пароль:
                </label>
                <input type="password" name="userPassword" id="password-input" autocomplete="off">
                <button id="button-form-enter">
                    Вход
                </button>
            </form>
            <button id="create-account">
                Создать аккаунт
            </button>
        </div>
        <div id="form-register" style="display: none;">
            <div id="enter-register_exit-register">
                <img src="/Picture/Exit.svg" alt="exit">
            </div>
            <h1>
                Регистрация
            </h1>
            <form id="form-form-register">
                <label for="name-register">
                    Имя:
                </label>
                <input type="text" name="userName" id="name-register" autocomplete="off"> 
                <label for="email-register">
                    E-mail
                </label>
                <input type="email" name="userEmail" id="email-register" autocomplete="off">
                <label for="password-register">
                    Пароль:
                </label>
                <input type="password" name="userPassword" id="password-register" autocomplete="off">
                <label for="repeat-password-register">
                    Повторите пароль:
                </label>
                <input type="password" name="userRepeatPassword" id="repeat-password-register" autocomplete="off">
                <button id="button-form-register">
                    Регистрация
                </button>
            </form>
        </div>
        <div class="background">
            <img src="/Picture/Logo.svg" alt="Logo">
        </div>
    </div>
    <div id="menu">
        <img id="logo" src="/Picture/Logo.svg" alt="Logo">
        <div id="javaScriptGuide" class="text">
            Руководство по JavaScript
        </div>
        <div id="practice" class="text">
            Практика
        </div>
        <div id="aboutTheSite" class="text">
            О сайте
        </div>
    </div>
    <div id="bodyContainer">
        <div id="containerLogoEnterRegister">
            <div id="logoEnterRegister">
                Вход / <br> Регистрация
            </div>
            <div id="exit" style = "display: none;">
                <img class="var" src="/Picture/ExitFromAccount.svg" alt="">
                <div id="user">

                </div>
            </div>
        </div>
        <div id="body" class="text">

        </div>
    </div>
    <script src="/JS/body.js"></script>
    <script src="/JS/tabs.js"></script>
    <script src="/JS/userAuthentication.js"></script>
</body>
</html>