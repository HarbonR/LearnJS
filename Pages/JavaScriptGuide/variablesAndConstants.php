<div>
    <b>Переменные и константы</b>
    <br>
    <br>Для хранения данных в программе используются <b>переменные</b> и <b>константы</b>. Переменные предназначены для хранения 
    каких-нибудь временных данных или таких данных, которые в процессе работы могут менять свое значение. 
    Константы, наоборот, предназначены для хранения неизменных данных, значение которых должно оставаться постоянным в течение всей программы.
    <br>
    <br><b>Объявление переменных</b>
    <br>
    <br>Для создания переменных применяются операторы var и let. Например, объявим переменную username:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">var</p> username;
    </div>
    <br>
    <br>Объявление переменной представляет отдельную инструкцию, поэтому завершается точкой с запятой.
    <br>
    <br>Аналогичное определение переменной с помощью оператора <b>let</b>:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> username;
    </div>
    <br>
    <br>Каждая переменная имеет имя. Имя представляет собой произвольный набор алфавитно-цифровых символов, знака подчеркивания (_) 
    или знака доллара ($), причем названия не должны начинаться с цифровых символов. То есть мы можем использовать в названии буквы, 
    цифры, подчеркивание и символ $. Однако все остальные символы запрещены.
    <br>
    <br>Например, правильные названия переменных:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>$commision
        <br>someVariable
        <br>product_Store
        <br>income2
        <br>myIncome_from_deposit
    </div>
    <br>
    <br>Следующие названия являются некорректными и не могут использоваться:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>222lol
        <br>@someVariable
        <br>my%percent
    </div>
    <br>
    <br>Также нельзя давать переменным такие имена, которые совпадают с зарезервированными ключевыми словами. В JavaScript не так много 
    ключевых слов, поэтому данное правило не сложно соблюдать. Например, следующее название будет некорректным, так как for - ключевое слово в JavaScript:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br><p style="display: inline; color: #0077aa;">var for</p>;
    </div>
    <br>
    <br>Список зарезервированных слов в JavaScript:
    <br>
    <br>await, break, case, catch, class, const, continue, debugger, default, delete, do, else, enum, export, extends, false, finally, for, function, 
    if, import, in, instanceof, new, null, return, super, switch, this, throw, true, try, typeof, var, void, while, with, yield
    <br>
    <br>С развитием JavaScript и принятием новых стандартов языка список зарезервированных слов может пополняться, однако в целом их не так уж много.
    <br>
    <br>Также не рекомендуется объявлять переменные с именем, которые аналогичны уже имеющимся глобальным переменным. Например, для вывода на консоль 
    используется метод console.log(). Здесь console - это имя глобального объекта, и мы можем определить переменную с этим именем.
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>let console;    // определяем переменную console
        <br>console.log("Hello");   // ! Ошибка
    </div>
    <br>
    <br>Определение переменной console приведет к тому, что она переопределит одноименный глобальный объект console, и при вызове метода console.log() мы столкнемся с ошибкой.
    <br>
    <br>Подобных глобальных объектов не так много, кроме console это также alert, blur, close, closed, document, focus, frames, location, navigator, open, screen, window.
    <br>
    <br>При названии переменных надо учитывать, что JavaScript является <b>регистрозависимым</b> языком, то есть в следующем коде объявлены две разные переменные:
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>let username;
        <br>let userName;
    </div>
    <br>
    <br>Через запятую можно определить сразу несколько переменных:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>var username, age, height;
        <br>let a, b, c;
    </div>
    <br>
    <br><b>Присвоение переменной значения</b>
    <br>
    <br>После определения переменной ей можно присвоить какое-либо значение. Для этого применяется <b>оператор присваивания</b> (<b>=</b>):
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>var username;
        <br>username = "Tom";
    </div>
    <br>
    <br>То есть в данном случае переменная username будет хранить строку "Tom". После присвоения переменной значения мы можем что-то сделать 
    с этим значением, например, выведем его на консоль:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>&lt;!DOCTYPE html&gt;
        <br>&lt;html&gt;
        <br>&lt;head&gt;
        <br>&lt;meta charset="utf-8" /&gt;
        <br>&lt;title&gt;METANIT.COM&lt;/title&gt;
        <br>&lt;/head&gt;
        <br>&lt;body&gt;
        <br>&lt;script&gt;
        <br>let username;           // Определение переменной username
        <br>username = "Tom";       // Присвоение переменной значения
        <br>console.log(username);  // Вывод значения переменной username на консоль
        <br>&lt;/script&gt;
        <br>&lt;/body&gt;
        <br>&lt;/html&gt;
    </div>
    <br>
    <br><img src="https://metanit.com/web/javascript/pics/2.6.png" alt="">
    <br>
    <br>Можно сразу присвоить переменной значение при ее определении:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>var username = "Tom";
        <br>let userage = 37;
    </div>
    <br>
    <br>Процесс присвоения переменной начального значения называется инициализацией.Можно обратить внимание, что одна переменная определена 
    с помощью let, а другая - с помощью var. Конкретно в данном случае это не имеет значения, и мы могли бы определить обе переменных 
    либо с помощью let, либо с помощью var. Но в целом между let и var, есть различия, которые будут рассмотрены в одной из следующих статьях.
    <br>
    <br>Можно сразу инициализировать несколько переменных:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">	
        <br>let name1 = "Tom", name2 = "Bob", name3 = "Sam";
        <br>console.log(name1);  // Tom
        <br>console.log(name2);  // Bob
        <br>console.log(name3);  // Sam
    </div>
    <br>
    <br>JavaScript позволяет некоторые вольности при определении переменной. Так, мы можем НЕ использовать ключевые слова <b>let</b> или <b>var</b>
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>&lt;!DOCTYPE html&gt;
        <br>&lt;html&gt;
        <br>&lt;head&gt;
        <br>&lt;meta charset="utf-8"/&gt;
        <br>&lt;title&gt;METANIT.COM&lt;/title&gt;
        <br>&lt;/head&gt;
        <br>&lt;body&gt;
        <br>&lt;script&gt;
        <br>username = "Tom"; // ошибки нет, норм
        <br>console.log(username); // Tom
        <br>&lt;/script&gt; 
        <br>&lt;/body&gt;
        <br>&lt;/html&gt;
    </div>
    <br>
    <br>Хотя мы можем так делать, но это не самый рекомендуемый подход. В одной из следующих статей мы увидим, с какими проблемами мы можем столкнуться при подобном подходе.
    <br>
    <br><b>Изменение переменных</b>
    <br>
    <br>Отличительной чертой переменных является то, что мы можем изменить их значение:
    <br><br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>&lt;!DOCTYPE html&gt;
        <br>&lt;html&gt;
        <br>&lt;head&gt;
        <br>&lt;meta charset="utf-8"/&gt;
        <br>&lt;title&gt;METANIT.COM&lt;/title&gt;
        <br>&lt;/head&gt;
        <br>&lt;body&gt;
        <br>&lt;script&gt;
        <br>let username = "Tom";
        <br>console.log("username до изменения:", username);
        <br>username = "Bob";
        <br>console.log("username после изменения:", username);
        <br>&lt;/script&gt;
        <br>&lt;/body&gt;
        <br>&lt;/html&gt;
    </div>
    <br>
    <br><img src="https://metanit.com/web/javascript/pics/2.7.png" alt="">
    <br>
    <br><b>Константы</b>
    <br>
    <br>С помощью ключевого слова <b>const</b> можно определить <b>константу</b>, которая, как и переменная, хранит значение, однако это значение не может быть изменено.
    <br><br>
    <div style="padding: 20px 0 20px 20px; background-color: #eeeef0;">
        const username = "Tom";
    </div>
    <br>
    <br>Если мы попробуем изменить ее значение, то мы столкнемся с ошибкой:
    <br><br>
    <div style="padding: 20px 0 20px 20px; background-color: #eeeef0;">
        const username = "Tom";
        username = "Bob";   // ошибка, username - константа, поэтому мы не можем изменить ее значение
    </div>
    <br>
    <br><img src="https://metanit.com/web/javascript/pics/2.8.png" alt="">
    <br>
    <br>Также стоит отметить, что поскольку мы не можем изменить значение константы, то она должна быть инициализирована, то есть при ее определении мы должны предоставить 
    ей начальное значение. Если мы этого не сделаем, то опять же мы столкнемся с ошибкой:
    <br><br>
    <div style="padding: 20px 0 20px 20px; background-color: #eeeef0;">
        const username; // ошибка, username не инициализирована
    </div>

    <br>Когда использовать переменные, а когда константы? Если вы уверены, что значение в процессе программы не будет изменяться, тогда это значение определяется в виде 
    константы. Если неизвестно, будет ли значение меняться или нет, то рекомендуется определить значение как константу. А в случае если в далее потребуется его изменить, 
    то просто можно изменить определение значения с <b>const</b> на <b>var</b>/<b>let</b>.
    <br><br>
</div>