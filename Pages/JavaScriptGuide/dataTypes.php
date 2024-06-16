<div>
    <b>Типы данных</b>
    <br>
    <br>Все используемые данные в javascript имеют определенный тип. В JavaScript имеется восемь типов данных:
    <br>
    <ul>
        <li><b>String</b>: представляет строку</li>
        <li><b>Number</b>: представляет числовое значение</li>
        <li><b>BigInt</b>: предназначен для представления очень больших целых чисел</li>
        <li><b>Boolean</b>: представляет логическое значение <b>true</b> или <b>false</b></li>
        <li><b>Undefined</b>: представляет одно специальное значение - <b>undefined</b> и указывает, что значение не установлено</li>
        <li><b>Null</b>: представляет одно специальное значение - <b>null</b> и указывает на отсутствие значения</li>
        <li><b>Symbol</b>: представляет уникальное значение, которое часто применяется для обращения к свойствам сложных объектов</li>
        <li><b>Object</b>: представляет комплексный объект</li>
    </ul>
    Первые семь типов представляют примитивные типы данных. Последний тип - Object представляет сложный, комплексный тип данных, 
    который состоит из значений примитивных типов или других объектов. Рассмотрим основные примитивные типы данных.
    <br>
    <br>
    <b>Числовые данные</b>
    <br>
    <br>
    <b>Number</b>
    <br>
    <br>Тип <b>Number</b> представляет числа в JavaScript, которые могут быть целыми или дробными:
    <ul>
        <li>Целые числа, например, 35. Мы можем использовать как положительные, так и отрицательные числа. Диапазон используемых чисел: от -2<sup>53</sup> до 2<sup>53</sup></li>
        <li>Дробные числа (числа с плавающей точкой). В качестве разделителя дробной и целой части применяется точка, например, 3.5575. Опять же можно использовать 
            как положительные, так и отрицательные числа. Для чисел с плавающей точкой используется тот же диапазон: от -2<sup>53</sup> до 2<sup>53</sup></li>
    </ul>
    Например:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> x = 45;
        <br><p style="display: inline; color: #0077aa;">const</p> y = 123.897;
        <br><p style="display: inline; color: #0077aa;">const</p> z = -0.123;
    </div>
    <br>
    <br>JavaScript поддерживает возможность определять числа в двоичной, восьмеричной и шестнадцатеричной системах, что очень удобно, если нам предстоит проводить 
    поразрядные операции с отдельными битами числа. Для определения числа в двоичной системе, перед числом указывается префикс <b>0b</b>:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num1 = 0b1011;    <p style="display: inline; color: #afa4ac;">// число 11 в десятичной системе</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num1);      <p style="display: inline; color: #afa4ac;">// 11</p>
    </div>
    <br>
    <br>В данном случае константа num1 равна 0b1011, что в десятичной системе эквивалентно 11.
    <br>
    <br>Для определения числа в восьмеричной системе, перед числом указывается префикс <b>0o</b>:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num1 = 0o11;    <p style="display: inline; color: #afa4ac;">// число 9 в десятичной системе</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num1);      <p style="display: inline; color: #afa4ac;">// 9</p>
    </div>
    <br>
    <br>Для определения числа в шестнадцатеричной системе, перед числом указывается префикс <b>0x</b>:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num1 = 0xff;    <p style="display: inline; color: #afa4ac;">// число 255 в десятичной системе</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num1);     <p style="display: inline; color: #afa4ac;">// 255</p>
        <br><p style="display: inline; color: #0077aa;">const</p> num2 = 0x1A;    <p style="display: inline; color: #afa4ac;">// число 26 в десятичной системе</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num2);     <p style="display: inline; color: #afa4ac;">// 26</p>
    </div>
    <br>
    <br>Начиная со стандарта ECMA2021 в JavaScript для увеличения читабельности в качестве разделителя между разрядами можно использовать символ подчеркивания _:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num1 = 1234567;
        <br><p style="display: inline; color: #0077aa;">const</p> num2 = 123_4567;  <p style="display: inline; color: #afa4ac;">// число равное num1</p>
        <br>
        <br>
        <br><p style="display: inline; color: #0077aa;">const</p> num3 = 1234567890;
        <br><p style="display: inline; color: #0077aa;">const</p> num4 = 12_3456_7890;    <p style="display: inline; color: #afa4ac;">// число равное num3</p>
    </div>
    <br>
    <br><b>Тип BigInt</b>
    <br>
    <br>Тип <b>BigInt</b> добавлен в последних стандартах JavaScript для представления очень больших целых чисел, которые выходят за пределы диапазона типа number. 
    Это не значит, что мы не можем совсем работать с большими числами с помощью типа number, 
    но работа с ними в случае с типом number будет сопряжена с проблемами. Рассмотрим небольшой пример:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> num = 9007199254740991
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num);       <p style="display: inline; color: #afa4ac;">// 9007199254740991</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num + 1);   <p style="display: inline; color: #afa4ac;">// 9007199254740992</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num + 2);   <p style="display: inline; color: #afa4ac;">// 9007199254740992</p>
    </div>
    <br>
    <br>Здесь переменной num присваивается максимальное значение. И далее прибавляем к ней некоторые значения и выводим на консоль результат. И результаты могут нас смутить,
     особенно в случае прибавления числа 2.
     <br>
     <br>Стоит отметить, что тип Number ограничен, хотя и позволяет оперировать довольно большим диапазоном чисел. В частности, мы можем использовать специальные константы 
    Number.MIN_VALUE и Number.MAX_VALUE для проверки минимального и максимального возможных значений для типа Number:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(Number.MIN_VALUE);   <p style="display: inline; color: #afa4ac;">// 5e-324</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(Number.MAX_VALUE);  <p style="display: inline; color: #afa4ac;">// 1.7976931348623157e+308</p>
    </div>
    <br>
    <br>Например, рассмотрим следующий пример:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num = 9223372036854775801;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num);   <p style="display: inline; color: #afa4ac;">// 9223372036854776000</p>
    </div>
    <br>
    <br>В силу ограничений типа Number на консоли мы увидим несколько другое число, нежели мы присвоили константе num. Это может негативно влиять на точность в вычислениях. 
    И для подобных подобных чисел как раз предназначен тип <b>BigInt</b>. Для определения числа как значения типа BigInt в конце числа добавляется суффикс <b>n</b>:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> dimension = 19007n;
        <br><p style="display: inline; color: #0077aa;">const</p> value = 2545n;
    </div>
    <br>
    <br>Например, изменим из предыдущего примера тип number на bigint:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> num = 9223372036854775801n;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(num);   <p style="display: inline; color: #afa4ac;">// 9223372036854775801n</p>
    </div>
    <br>
    <br>Теперь консоль выводит корректный результат.
    <br>
    <br><b>Тип Boolean</b>
    <br>
    <br>Тип Boolean представляет булевые или логические значения <b><p style="display: inline; color: #990055;">true</p>;</b> (верно) и <b><p style="display: inline; color: #990055;">false</p>;</b> (ложно):
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> isAlive = <p style="display: inline; color: #990055;">true</p>;
        <br><p style="display: inline; color: #0077aa;">const</p> isDead = <p style="display: inline; color: #990055;">false</p>;
    </div>
    <br>
    <br>Строки String
    <br>
    <br>Тип String представляет строки. Для определения строк применяются кавычки, причем, можно использовать как двойные, так одинарные, так и косые кавычки. 
    Единственно ограничение: тип закрывающей кавычки должен быть тот же, что и тип открывающей, то есть либо обе двойные, либо обе одинарные.
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> user = "Tom";
        <br><p style="display: inline; color: #0077aa;">const</p> company = 'Microsoft';
        <br><p style="display: inline; color: #0077aa;">const</p> language = `JavaScript`;
        <br>
        <br>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(user);
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(company);
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(language);
    </div>
    <br>
    <br>Если внутри строки встречаются кавычки, то мы их должны экранировать слешем. Например, пусть у нас есть текст "Бюро "Рога и копыта"". Теперь экранируем кавычки:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> company = "Бюро \"Рога и копыта\"";
    </div>
    <br>
    <br>Также мы можем внутри стоки использовать другой тип кавычек:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> company1 = "Бюро 'Рога и копыта'";
        <br><p style="display: inline; color: #0077aa;">const</p> company2 = 'Бюро "Рога и копыта"';
    </div>
    <br>
    <br>Также строка может содержать специальные символы - управляющие последовательности, которые интерпретируются определенным образом. 
    Самые распространенные последовательности - это "\n" (перевод на другую строку) и "\t" (табуляция). Например:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> text = "Hello METANIT.COM\nHello\tWorld";
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(text); 
    </div>
    <br>
    <br>При выводе на консоль текст из константы text будет интерпретироваться следующим образом:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>Hello METANIT.COM
        <br>Hello	World
    </div>
    <br>
    <br><b>Интерполяция</b>
    <br>
    <br>Использование косых кавычек позволяет нам применять такой прием как <b>интерполяция</b> - встраивать данные в строку. Например:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> user = "Tom";
        <br><p style="display: inline; color: #0077aa;">const</p> text = `Name: ${user}`;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(text);  <p style="display: inline; color: #afa4ac;">// Name: Tom</p>
    </div>
    <br>Для встраивания значений выражений (например, значений других переменных и констант) в строку перед выражением ставится знак доллара <b>$</b>, 
    после которого в фигурных скобках указывается выражение. Так, в примере выше ${user} означает, что в этом месте строки надо встроить значение переменной user.
    <br>
    <br>Подобным образом можно встраивать и больше количество данных:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> user = "Tom";
        <br><p style="display: inline; color: #0077aa;">const</p> age = 37;
        <br><p style="display: inline; color: #0077aa;">const</p> isMarried = <p style="display: inline; color: #990055;">false</p>;
        <br><p style="display: inline; color: #0077aa;">const</p> text = `Name: ${user}   Age: ${age}   IsMarried: ${isMarried}`;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(text);  <p style="display: inline; color: #afa4ac;">// Name: Tom Age: 37 IsMarried: false;</p>
    </div>
    <br>
    <br>Кроме интерполяции косые кавычки позволяют определять многострочный текст:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> text = 
        <br>`Мы все учились понемногу
        <br>Чему-нибудь и как-нибудь,
        <br>Так воспитаньем, слава богу,
        <br>У нас немудрено блеснуть.`;
        <br>
        <br>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(text);
    </div>
    <br>
    <br>Консольный вывод браузера:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br>Мы все учились понемногу
        <br>Чему-нибудь и как-нибудь,
        <br>Так воспитаньем, слава богу,
        <br>У нас немудрено блеснуть.
    </div>
    <br>
    <br><b>null и undefined</b>
    <br>
    <br><b>undefined</b> указывает, что значение не определено или не установлено. 
    Например, когда мы только определяем переменную без присвоения ей начального значения, она представляет тип undefined:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> email;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(email); <p style="display: inline; color: #afa4ac;">// выведет undefined</p>
    </div>
    <br>
    <br>Присвоение значение null означает, что у переменной отсутствует значение:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> email;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(email); <p style="display: inline; color: #afa4ac;">// undefined</p>
        <br>email = null;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(email);     <p style="display: inline; color: #afa4ac;">// null</p>
    </div>
    <br>
    <br>Стоит отметить, что хотя в принципе можно переменной присвоить значение undefined, как в следующем случае:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> email = "tome@mimimail.com";
        <br>email = undefined;      // установим тип undefined
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(email); <p style="display: inline; color: #afa4ac;">// undefined</p>
    </div>
    <br>
    <br>Но основной смысл undefined состоит в том, что переменная неинициализирована, что обычно происходит до первого присвоения
    ей какого-либо значения. Поэтому обычно не предполагается, что переменной явным образом будет присваиваться значение undefined. 
    В тоже время этот тип может быть полезен - мы можем использовать его на проверку инициализации переменной. Но если же нам надо указать, 
    что у переменной нет никакого значения, то ей присваивается null, а не undefine.
    <br>
    <br><b>object</b>
    <br>
    <br>Тип object представляет сложный объект. Простейшее определение объекта представляют фигурные скобки:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> user = {};
    </div>
    <br>
    <br>Объект может иметь различные свойства и методы:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">const</p> user = {name: "Tom", age:24};
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(user.name);
    </div>
    <br>
    <br>В данном случае объект называется user, и он имеет два свойства: name и age, которые в качестве значения принимают данные других типов. 
    Это краткое описание объектов, более подробно объекты мы рассмотрим в последующих статьях.
    <br>
    <br><b>Слабая/динамическая типизация</b>
    <br>
    <br>JavaScript является языком со слабой и динамической типизацией. Это значит, что переменные могут динамически менять тип. Например:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> id;  <p style="display: inline; color: #afa4ac;">// тип undefined</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(id);
        <br>id = 45;  <p style="display: inline; color: #afa4ac;">// тип number</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(id);
        <br>id = "45"; <p style="display: inline; color: #afa4ac;">// тип string</p>
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(id);
    </div>
    <br>
    <br>Несмотря на то, что во втором и третьем случае консоль выведет нам число 45, но во втором случае переменная id будет представлять число, а в третьем случае - строку.
    <br>
    <br><b>Оператор typeof</b>
    <br>
    <br>С помощью оператора <b>typeof</b> можно получить тип переменной, что может быть полезно, когда в зависимости от типа переменной необходимо выполнить те или иные действия:
    <br>
    <br>
    <div style="padding: 0 0 20px 20px; background-color: #eeeef0;">
        <br><p style="display: inline; color: #0077aa;">let</p> id;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(typeof id);       <p style="display: inline; color: #afa4ac;">// undefined</p>
        <br>
        <br>
        <br>id = 45;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(typeof id);   <p style="display: inline; color: #afa4ac;">// number</p>
        <br>
        <br>
        <br>id = 45n;
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(typeof id);     <p style="display: inline; color: #afa4ac;">// bigint</p>
        <br>
        <br>
        <br>id = "45";
        <br>console.<p style="display: inline; color: #dd4a68;">log</p>(typeof id);     <p style="display: inline; color: #afa4ac;">// string</p>
    </div>
    <br>
    <br>Стоит отметить, что для значения <b>null</b> оператор typeof возвращает значение "object", 
    несмотря на то, что согласно спецификации JavaScript значение <b>null</b> представляет отдельный тип.
    <br>
    <br>
</div>