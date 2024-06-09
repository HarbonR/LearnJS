<div class="container" style="font-size: 20px;">
    <div style="font-size: 100px;">
        <span style="display: inline-flex; background-color: #f7df1e; padding: 10px 20px 10px 20px; font-size: 110px;">
            <b>JS</b>
        </span>
        <span>
            JavaScript
        </span>
    </div>
    <div>
        <b>Логическое программирование в JavaScript</b> относится к использованию логических конструкций 
        и декларативных парадигм для решения проблем. В JavaScript это реализуется в первую очередь 
        с помощью библиотек сторонних производителей, таких как:<br>
        <br><b>Библиотеки логического программирования на JavaScript:</b>
        <ul>
            <li>Prolog.js: Реализация языка логического программирования Prolog в JavaScript.</li>
            <li>jLOPS: Логическая объектно-ориентированная система программирования в JavaScript.</li>
            <li>clisp.js: Порт языка логического программирования Common Lisp в JavaScript.</li>
            <li>Mercury.js: Реализация языка логического программирования Mercury в JavaScript.</li>
        </ul>
        <br><b>Возможности логического программирования в JavaScript:</b>
        <ul>
            <li>Декларативная парадигма: В логическом программировании вы описываете проблему, а не способ ее решения.</li>
            <li>Сопоставление с образцом: Сопоставляет факты с шаблонами и выполняет действия на основе совпадений.</li>
            <li>Запросы: Выражает запросы к базе знаний как логические формулы.</li>
            <li>Рекурсия: Использование рекурсивных правил для решения проблем.</li>
            <li>Обработка неопределенности: Логическое программирование может обрабатывать неопределенность и частичную информацию.</li>
        </ul>
        <br><b>Применение логического программирования в JavaScript:</b>
        <ul>
            <li>Системы искусственного интеллекта (ИИ)</li>
            <li>Обработка естественного языка (NLP)</li>
            <li>Экспертные системы</li>
            <li>Планирование и рассуждения</li>
            <li>Обработка знаний и данных</li>
        </ul>
        <br><b>Пример кода на Prolog.js:</b>
        <div style="padding: 0 0 20px 20px; background-color: #eeeef0; width: 500px;">
            <br>Picture copied.png
            <br>% Факты
            <br>father(john, alice).
            <br>father(john, bob).
            <br>mother(mary, alice).
            <br>mother(mary, bob).
            <br>% Правило
            <br>sibling(X, Y) :- father(Z, X), father(Z, Y), X \= Y.
            <br>% Запрос
            <br>sibling(alice, bob).
            <br>Вывод:
            <br>true
        </div>
    </div>
</div>