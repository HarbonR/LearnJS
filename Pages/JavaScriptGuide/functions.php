<div>
    <b>Функции</b>
    <br>
    <br>Функции представляют собой набор инструкций, которые можно повторно вызывать в различных частях программы по имени функции. 
    В общем случае синтаксис определения функции выглядит следующим образом:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>function имя_функции(параметры){
            <br>
            <br>// Инструкции
        <br>}
    </div>
    <br>
    <br>Определение функции начинается с ключевого слова <b>function</b>, после которого следует имя функции. Наименование функции подчиняется тем же правилам, что и 
    наименование переменной: оно может содержать только цифры, буквы, символы подчеркивания и доллара ($) и должно начинаться с буквы, символа подчеркивания или доллара.
    <br>
    <br>После имени функции в скобках идет перечисление параметров. Даже если параметров у функции нет, то просто идут пустые скобки. Затем в фигурных скобках идет тело 
    функции, содержащее набор инструкций.
    <br>
    <br>Определим простейшую функцию:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>function hello(){
            <br>
            <br>console.log("Hello Metanit.com");
        <br>}
    </div>
    <br>
    <br>Данная функция называется hello(). Она не принимает никаких параметров и все, что она делает, это выводит на консоль браузера строку "Hello Metanit.com".
    <br>
    <br>Чтобы функция выполнила свою работу, нам надо ее вызвать. Общий синтаксис вызова функции:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>имя_функции(параметры)
    </div>
    <br>
    <br>При вызове после имени вызываемой функции в скобках указывается список параметров. Если функция не имеет параметров, то указывются пустые скобки.
    <br>
    <br>Например, определим и вызовем простейшую функцию:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>&lt;!DOCTYPE html&gt;
        <br>&lt;html&gt;
        <br>&lt;head&gt;
        <br>&lt;meta charset="utf-8" /&gt;
            <br>&lt;title&gt;METANIT.COM&lt;/title&gt;
        <br>&lt;/head&gt;
        <br>&lt;body&gt;
        <br>&lt;script&gt;
        <br>// определение функции
        <br>function hello(){
            <br>
            <br>console.log("Hello Metanit.com");
            <br>}
        <br>// вызов функции
        <br>hello();
        <br>&lt;/script&gt;
        <br>&lt;/body&gt;
        <br>&lt;/html&gt;
    </div>
    <br>
    <br>В данном случае функция hello не принимает параметров, поэтому при ее вызове указываются пустые скобки:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>hello();
    </div>
    <br>
    <img src="https://metanit.com/web/javascript/pics/3.2.png" alt="">
    <br>
    <br>Отличительной чертой функций является то, что их можно многократно вызывать в различных местах программы:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>// определение функции
        <br>function hello(){
            <br>console.log("Hello Metanit.com");
            <br>}
        <br>// вызов функции
        <br>hello();
        <br>hello();
        <br>hello();
    </div>
    <br>
    <br><b>Переменные и константы в качестве функций</b>
    <br>
    <br>Подобно тому, как константам и переменным присваиваются простейшие значения (числа, строки и т.д.), 
    также им можно присваивать функции. Затем через такую переменную или константу можно вызвать присвоенную ей функцию:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>&lt;!DOCTYPE html&gt;
        <br>&lt;html&gt;
        <br>&lt;head&gt;
        <br>&lt;meta charset="utf-8" /&gt;
            <br>&lt;title&gt;METANIT.COM&lt;/title&gt;
            <br>&lt;/head&gt;
        <br>&lt;body&gt;
        <br>&lt;script&gt;
        <br>// определение функции
        <br>function hello(){
            <br>console.log("Hello from Metanit.com");
            <br>}
        <br>// передача константе message ссылки на функцию hello
        <br>const message = hello;
        <br>message();  // вызываем функцию, ссылка на которую хранится в константе message
        <br>&lt;/script&gt;
        <br>&lt;/body&gt;
        <br>&lt;/html&gt;
    </div>
    <br>
    <br>Присвоив константе или переменной функцию:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>const message = hello;
    </div>
    <br>
    <br>затем мы можем по имени константы/переменной вызывать эту функцию:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>message();
    </div>
    <br>
    <br>Также мы можем динамически менять функции, которые хранятся в переменной:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>function goodMorning(){
            <br>console.log("Доброе утро");
        <br>}
        <br>function goodEvening(){
            <br>console.log("Добрый вечер");
            <br>}
        <br>let message = goodMorning;      // присваиваем переменной message функцию goodMorning
        <br>message();      // Доброе утро
        <br>message = goodEvening;          // меняем функцию в переменной message
        <br>message();      // Добрый вечер
    </div>
    <br>
    <br><b>Функции-выражения и анонимные функции</b>
    <br>
    <br>Необязательно давать функциям определенное имя. Можно использовать анонимные функции. 
    Такие функции при определении присваиваются константе или переменной. Эти функции еще называют функции-выражения (function expression):
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>const message = function(){
            <br>
            <br>console.log("Hello JavaScript");
        <br>}
        <br>message();
    </div>
    <br>
    <br>Используя имя константы или переменной, которой присвоена функция, можно вызывать эту функцию.
    <br>
    <br><b>Локальные функции</b>
    <br>
    <br>JavaScript позволяет определять локальные функции - функции внутри других функций. Локальные функции видно только в рамках внешней функции, в которой они определены. 
    Например:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>function print(){
            <br>
            <br>printHello();
        <br>printHello();
        <br>printHello();
        <br>
        <br>function printHello(){
            <br>console.log("Hello");
            <br>}
        <br>}
        <br>print();
        <br>printHello();   // Uncaught ReferenceError: printHello is not defined - локальную функцию можно вызвать только из ее окружающей функции
    </div>
    <br>
    <br>Здесь внутри функции print определена локальная функция printHello, которая просто выводит строку "Hello". И внутри функции print мы можем вызвать 
    локальную функцию printHello, однако вне окружающей функции локальную функцию вызвать нельзя.
    <br>
    <br>Данный пример довольно простой и не имеет большого смысла. Однако, как правило, локальные функции определяются для таких действий, которые 
    применяются многократно только в рамках какой-то одной функции и больше нигде. К минусам локальных функции можно отнести то, что они создаются всякий раз, 
    когда происходит вызов внешней функции.
    <br>
    <br>
</div>