<!DOCTYPE html>
<html lang="en">
 	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  		<title>PHP Best Practices | PHP лучшие решения</title>
  		<link href="/css/bootstrap.min.css" rel="stylesheet">
  		<link href="/css/style.css" rel="stylesheet">
  		<script src="/js/jquery-2.0.3.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/js/code/shCore.js"></script>
		<script type="text/javascript" src="/js/code/shBrushPhp.js"></script>
		<link type="text/css" rel="stylesheet" href="css/code/shCoreDefault.css"/>
		<script type="text/javascript"></script>
		<script type="text/javascript">
		$(function(){
			$('body').scrollspy();
			SyntaxHighlighter.all();
		});
		</script>
	</head>
<body data-spy="scroll" data-target="#navbar">

<nav class="navbar navbar-fixed-top navbar-default" role="navigation">
  <div class="container">
  <div class="navbar-header">
    <a class="navbar-brand" href="/"><span>php</span> best practices</a>
  </div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-3">
<nav class="bs-sidebar hidden-print affix" role="" id="#navbar">
    <ul class="nav $(function(){
    $('body').scrollspy();
    });-sidenav">
    	<li><a href="#introduction">Введение</a></li>
        <li><a href="#whatisthat">Что это?</a></li>
        <li><a href="#whatisnot">Чем это не является?</a></li>
        <li><a href="#phpversion">Какую версию PHP мы используем.</a></li>
        <li><a href="#password_hashing">Хранение паролей</a></li>
        <li><a href="#mysql">Работа с базой данных MySQL</a></li>
        <li><a href="#tags">PHP тэги</a></li>
        <li><a href="#autoloading">Автозагрузка классов</a></li>
        <li><a href="#quotes">Одинарные кавычки против двойных</a></li>
        <li><a href="#defineconst">define() или const?</a></li>
        <li><a href="#opcode">Кэширование в PHP</a></li>
        <li><a href="#memcached">PHP и Memcached</a></li>
        <li><a href="#regex">PHP и regex</a></li>

        
    </ul>
</nav>
</div>

<div class="col-md-7">
<article>
<section id="introduction">
<h2>Введение</h2>
<p> За долгие годы своего существования, язык PHP прошел огонь, воду и медные трубы. Он крайне непоследователен, в нем уйма багов. Каждая версия имеет свои уникальные причуды, которые нужно помнить. Легко понять, почему некоторые, так сильно его не любят.</p>
 
<p>Однако, несмотря на это, на сегодняшний день PHP - самый популярный язык для веб-разработки. Учитывая эту популярность и его долгую, непростую историю, вы всегда можете найти в сети много инструкций о том, как сделать на нем основные вещи, типа хэширования паролей или доступа к БД. Проблема в том, что из пяти инструкций, все пять могут описывать совершенно разные способы. Какой-же выбрать? Какие есть тонкости и подводные камни? Сколько времени займет выбрать наиболее оптимальный способ?</p>

<p>Неудивительно, что код неопытных PHP программистов, так часто вызывает нервный хохот у тим-лидов, ведь, первый ответ гугла, часто выдает ссылку на четырехлетнюю статью, описывающую методы пятилетней давности.</p>

<p>Этот документ создан именно для таких случаев. Это попытка собрать набор основных best practices для повседневных и запутанных вопросов в PHP. Если задача имеет несколько возможных реализаций - вы найдете ее здесь.</p>
</p>
<hr />
</section>
<section id="whatisthat">
<h2>Что это?</h2>
<p>Бывает, что PHP предлагает нам несколько решений одной и той же задачи, например: вы можете работать с БД массой различных способов, но не все эти способы правильны. Этот гайд предлагает оптимальное решение для таких неоднозначных задач.</p>

<p>Это сборник вводных решений. Примеры покажут вам правильный путь, настроят на правильный лад, но вы должны провести свой собственный ресерч, что бы превратить их во что-то полезное для вас.</p>

<p>В этом документе, я пишу код не оглядываясь на совместимость со старыми версиями PHP, так что, если у вас устаревший интерпретатор - некоторые примеры работать не будут. </p>
<hr />
</section>
<section id="whatisnot">
<h2>Чем это не является?</h2>
<p>Это не самоучитель по PHP. Основы и синтаксис языка нужно учить по книгам и специализированным ресурсам. Это, также, не гайд по распространенным задачам веб-приложений: хранение куки, кэширование, стиль кода, документация и т.д.</p>
<p>Это не гайд по безопасности. Хотя тут и затрагиваются некоторые проблемы безопасности, вам все же нужно провести собственный ресерч на эту тему, что бы защитить свои приложения. Также, вы должны внимательно проверить все решения представленные здесь, перед тем, как их использовать. <b>Ваш код - только на вашей совести</b>.</p>

<p>Это не пропаганда определенного стиля кода, шаблона или фреймворка.</p>

<p>Тут не затрагиваются способы реализации высокоуровневых задач, как например: регистрация пользователей, система обмена сообщениями и т.д. Этот документ строго про низкоуровневые задачи.</p>

<p>Описанные решения не являются единственно-верными. Некоторые из них, могут не подходить для вашей конкретной ситуации, и есть множество других путей, для достижения тех же целей.</p>
<hr />
</section>
<section id="phpversion">
<h2>Какую версию PHP мы используем.</h2>
<div class="alert alert-info">PHP 5.5.6, установленная на Ubuntu 13.04</div>

<p>Обратите внимание, что на shared хостнгах, ваша конфигурация может ограничивать некоторые возможности. </p>

<p>Конечно, данные решения будут работать и на большинстве других, более старых версиях, но использовать ли их - решать только вам. В этом случае, необходимо выяснить все тонкости и возможные подводные камни применения этих решений на устаревших версиях PHP.</p>
<hr />
</section>
<section id="password_hashing">
<h2>Хранение паролей</h2>
<div class="alert alert-info">Используйте библиотеку <a target="_blank" href="http://www.openwall.com/phpass/">phpass</a> для хэширования и сравнения паролей.</div>
<div class="alert alert-warning">Проверенно на phpass 0.3</div>
<p>Хеширование - это стандартный способ защиты пользовательских паролей, перед сохранением в базу. Множество обычных алгоритмов хэширования, как md5 и даже sha1 не безопасны т.к. <a href="http://arstechnica.com/security/2013/05/how-crackers-make-minced-meat-out-of-your-passwords/" target="_blank">хакеры могут легко их взломать.</a> </p>

<p>Самый безопасный способ хэширования паролей - использование алгоритма bcrypt. Открытая библиотека  <a target="_blank" href="http://www.openwall.com/phpass/">phpass</a>  предоставляет функционал для работы с bcrypt, при помощи легкого интуитивно-понятного класса. </p>
<h3>Пример:</h3>
<pre class="brush: php;">
&lt;?php
// Подключаем библиотеку phpass
require_once('phpass-0.3/PasswordHash.php');
 
$hasher = new PasswordHash(8, false);
 
// Хэшируем пароль.  $hashedPassword - строка в 60 символов.
$hashedPassword = $hasher->HashPassword('my super cool password');
 
// Теперь можно сохранить содержимое $hashedPassword в вашей базе данных!
 
// Проверяем, ввел ли пользователь верный пароль, сравнивая то, что он ввел с нашим хэшем
$hasher->CheckPassword('the wrong password', $hashedPassword); // false
 
$hasher->CheckPassword('my super cool password', $hashedPassword); // true
?>
</pre>
<h3>Подводные камни</h3>
<p>Многие источники рекомендуют также использовать соль при хэшировании. Это отличная идея, и phpass уже делает это для вашего пароля. </p>
<h3>Что почитать:</h3>
<ul>
<li><a target="_blank" href="http://www.openwall.com/phpass/">phpass</a> [eng]</li>
<li><a target="_blank" href="http://blogs.msdn.com/b/lixiong/archive/2011/12/25/md5-sha1-salt-and-bcrypt.aspx">Почему хэшировать пароли md5 и sha не безопасно</a> [eng]</li>
<li><a target="_blank" href="http://codahale.com/how-to-safely-store-a-password/">Как безопасно хранить пароли</a> [eng]</li>
</ul>
<hr />
</section>
<section id="mysql">
<h2>Работа с базой данных MySQL</h2>
<div class="alert alert-info">Используйте <a href="http://www.php.net/manual/ru/book.pdo.php">PDO</a> и его prepared синтаксис</div>
<p>Есть много способов работы с MySql в PHP. PDO (PHP Data Objects) - новейший и самый здравый из них. PDO имеет понятный интерфейс, работающий с множеством различный типов БД, используя объектно-ориентированный подход, и поддерживает большинство возможностей, предлагаемых современными БД.</p>

<p>Вы должны использовать PDO prepared синтаксис, что бы предотвратить возможные атаки sql injection. С помощью функции bindValue(), вы защитите код от sql injection первого порядка (однако это не стопроцентная защита).</p>
<p> В прошлом, приходилось использовать комбинацию экранирующих функций. С PDO все гораздо проще.</p>
<h3>Пример:</h3>
<pre class="brush: php;">
&lt;?php
try{
    // Создаем новое подключение.
    // Параметры PDO которые мы передаем:
    // PDO::ATTR_ERRMODE включает режим исключений при обработке ошибок. Необязательно, но удобно.
    // PDO::ATTR_PERSISTENT Отключает постоянное соединение, которое, в некоторых случаях, может вызвать проблемы. См. "Подводные камни".
    // PDO::MYSQL_ATTR_INIT_COMMAND Уведомляет подключение, что нужно передавать UTF-8 данные. Возможно вам это и не нужно, зависит от вашей конфигурации, но это избавит вас возможных проблем, при сохранении в базу строки UTF-8. См. "Подводные камни".
    $link = new PDO(   'mysql:host=your-hostname;dbname=your-db',
                       'your-username',
                       'your-password',
                       array(
                           PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                           PDO::ATTR_PERSISTENT => false,
                           PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8mb4'
                        )
                    );
 
    $handle = $link->prepare('select Username from Users where UserId = ? or Username = ? limit ?');
 
    // PHP bug: Если не задать PDO::PARAM_INT, PDO может обрамить аргументы в кавычки. Это может испортить некоторые запросы, которые не ожидают, что числа будут в кавычках.
    // Подробнее: https://bugs.php.net/bug.php?id=44639
    // Если вы не уверены, что передаете число, используйте функцию is_int().
    $handle->bindValue(1, 100, PDO::PARAM_INT);
    $handle->bindValue(2, 'Bilbo Baggins');
    $handle->bindValue(3, 5, PDO::PARAM_INT);
 
    $handle->execute();
 
    // Использование метода fetchAll() может быть достаточно тяжелым в плане ресурсов, если вы выбираете большое количество строк.
    // В этом случае, можно использовать метод fetch() и обрабатывать каждую выбранную строку одну за одной.
	$result = $handle->fetchAll(\PDO::FETCH_OBJ);
 
    foreach($result as $row){
        print($row->Username);
    }
}
catch(PDOException $ex){
    print($ex->getMessage());
}
?>
</pre>
<h3>Подводные камни</h3>
<p>Если не передать параметр  PDO::PARAM_INT в методе bindValue() для чисел, PDO обрамит их в кавычки, что может испортить некоторые запросы. См. <a href="https://bugs.php.net/bug.php?id=44639" target="_blank">Отчет об ошибке</a>.</p>

<p>Отсутствие ‘set names utf8mb4’ в качестве вашего первого запроса, может стать причиной того, что unicode данные сохранятся в БД неверно. Вообще, это зависит от вашей конфигурации, так что, можете не делать, если абсолютно уверенны, что у вас все в порядке.</p>

<p>Включение постоянного соединения, может привести к непредсказуемым проблемам связанным с параллельными соединениями. Но это проблема не языка, а приложения. Постоянное соединение безопасно использовать до тех пор, пока вы осознаете последствия. См. <a href="http://stackoverflow.com/questions/3332074/what-are-the-disadvantages-of-using-persistent-connection-in-pdo" target="_blank">вопрос на  Stack Overflow</a>. </p>

<p>Даже если вы используете ‘set names utf8mb4’ убедитесь, что в вашей БД таблицы в кодировке utf8mb4.</p>

<p>Вы можете использовать более одного запроса в execute(), если разделите их точкой с запятой, но <a href="https://bugs.php.net/bug.php?id=61207" target="_blank">опасайтесь бага</a>, который не исправлен в нашей версии php. </p>
<h3>Что почитать.</h3>
<ul>
<li><a target="_blank" href="http://www.php.net/manual/ru/book.pdo.php">PHP Manual: PDO</a></li>
<li><a target="_blank" href="http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/">Почему нужно использовать PDO для доступа к БД в PHP</a> [eng]</li>
<li><a target="_blank" href="http://stackoverflow.com/questions/1402017/php-pdo-vs-normal-mysql-connect">Stack Overflow: PHP PDO или обычный mysql_connect?</a> [eng]</li>
<li><a target="_blank" href="http://stackoverflow.com/questions/134099/are-pdo-prepared-statements-sufficient-to-prevent-sql-injection">Stack Overflow: Достаточно ли PDO prepared для предотвращения SQL injection?</a> [eng]</li>
<li><a target="_blank" href="http://stackoverflow.com/questions/2159434/set-names-utf8-in-mysql">Stack Overflow: SET NAMES utf8 в MySQL?</a> [eng]</li>
</ul>
<hr />
</section>
<section id="tags">
<h2>PHP тэги</h2>
<div class="alert alert-info">Используйте &lt;?php ?&gt;</div>	
<p>Есть несколько способов определить блок PHP: &lt;?php ?&gt;, &lt;?= ?>, &lt;? ?&gt; и &lt;% %&gt;. И хотя, самый короткий из них вводить удобнее всего, только один обеспечивает стопроцентную работу на всех серверах - это &lt;?php ?&gt;. Если есть вероятность, что вам когда-нибудь придется разворачивать ваше приложение на сервере, на котором у вас не будет возможности править конфигурацию - используйте &lt;?php ?&gt;. </p>
<p>Если вы программируете для себя, и точно знаете, что всегда будете иметь контроль над конфигурацией PHP, вы заметите, что короткие теги более удобные. Но помните: &lt;? ?&gt;  могут конфликтовать с XML кодом, а &lt;% %&gt; - это вообще-то стиль ASP.</p>
<p>Что бы вы не выбрали в итоге - будьте последовательны, придерживайтесь этого выбора.</p>
<h3>Подводные камни</h3>
<p>Если вставляете закрывающий ?&gt; тег в файле с PHP кодом (например в файле с определением класса), убедитесь, что не оставили после него никаких переводов строк. PHP парсер легко проглотит один символ перевода строки после закрывающего тега, но любые другие переводы строк, будут выведены в браузер, что совсем плохо, если далее у вас идет вывод HTTP заголовков.</p>
<p>При написании веб-приложений, убедитесь, что у вас нет пустых строк между закрывающим ?&gt; тегом и HTML тегом &lt;!doctype&gt;. В валидном HTML документе, тег &lt;!doctype&gt; должен находится на первой строке. </p>
<h3>Что почитать</h3>
<ul>
<li><a target="_blank" href="http://stackoverflow.com/questions/200640/are-php-short-tags-acceptable-to-use">Stack Overflow: Можно ли использовать короткие PHP теги?</a> [eng]</li>
</ul>
<hr />
</section>
<section id="autoloading">
<h2>Автозагрузка классов</h2>	
<div class="alert alert-info">Используйте <a href="http://www.php.net/manual/ru/function.spl-autoload-register.php" target="_blank">spl_autoload_register()</a> для регистрации вашей функции автозагрузки</div>	
<p>PHP предоставляет несколько способов автозагрузки файлов, содержащих классы, которые пока небыли загружены. Старый путь - использовать глобальную магическую функцию <i>__autoload()</i>. Однако, вы можете иметь только одну <i>__autoload()</i> функцию. Это означает, что если вы используете библиотеку, у которой тоже есть <i>__autoload()</i>, у вас будет конфликт.</p>
<p>Правильный путь в данном случае - это назвать функцию каким-либо уникальным именем, и зарегистрировать ее как функцию автозагрузки, с помощью <a href="http://www.php.net/manual/ru/function.spl-autoload-register.php" target="_blank">spl_autoload_register()</a>. Таким образом, у вас не будет конфликтов с чужим кодом.</p>
<pre class="brush: php;">
&lt;?php
// Для начала, определим нашу функцию.
function MyAutoload($className){
    include_once($className . '.php');
}
 
// Теперь зарегистрируем ее в PHP как функцию автозагрузки.
spl_autoload_register('MyAutoload');
 
// Пробуем!
// Т.к. мы не загрузили файл описывающий MyClass, наш автозагрузчик загрузит файл MyClass.php.
// В данном примере, предполагается, что класс MyClass определяется в файле MyClass.php.
$var = new MyClass();
?>
</pre>
<h3>Что почитать</h3>
<ul>
	<li><a target="_blank" href="http://www.php.net/manual/ru/function.spl-autoload-register.php">PHP Manual: spl_autoload_register()</a></li>
	<li><a target="_blank" href="http://stackoverflow.com/questions/791899/efficient-php-auto-loading-and-naming-strategies">Stack Overflow: Эффективные стратегии именования при автозагрузке файлов в PHP</a> [eng]</li>
</ul>
<hr />
</section>
<section id="quotes">
<h2>Одинарные кавычки против двойных, с точки зрения производительности.</h2>
<div class="alert alert-info">На самом деле - не важно.</div>
<p>Много храбрых воинов пало в святой войне одинарных кавычек против двойных. Строки в одинарных кавычках не парсятся, т.е., что бы вы не поместили в одинарные кавычки - оно и будет на выходе. Строки в двойных кавычках - парсятся, и любые переменные в строках будут обработаны интерпретатором. Также, экранированные символы, такие как: <b>\n</b> для перевода строки или <b>\t</b> для табуляции,  будут обработаны только в строках с двойными кавычками. </p>
 <p>Т.к. строки в двойных кавычках, обрабатываются во время выполнения, есть теория, что с точки зрения производительности, лучше использовать одинарные кавычки, дабы интерпретатор не обрабатывал лишних строк. В некотором смысле - это правда. Но для реального среднего веб приложения, разница настолько мала, что не имеет никакого значения, а значит не важно, что вы в итоге выберете. Для <b>экстримально</b> высоконагруженных приложений, небольшая разница возможно есть. 
<br />В любом случае, что бы вы не выбрали, будьте последовательны.</p>
 <h3>Что почитать</h3>
 <ul>
  <li><a target="_blank" href="http://www.php.net/manual/ru/language.types.string.php">PHP Manual: Строки</a></li>
  <li><a target="_blank" href="http://phpbench.com/">The PHP Benchmark</a> [eng]</li>
  <li><a target="_blank" href="http://stackoverflow.com/questions/482202/is-there-a-performance-benefit-single-quote-vs-double-quote-in-php">Stack Overflow: Возрастет ли производительность, если использовать одинарные кавычки?</a> [eng]</li>
</ul>
 <hr />
</section>
<section id="defineconst">
  <h2>define() или const?</h2>
  <div class="alert alert-info">Используйте const если нужно определить константу класса, или у вас жесткие требования к производительности. Иначе define().</div>
<p>Традиционно в PHP мы определяем константы используя функцию <a target="_blank" href="http://php.net/manual/ru/function.define.php">define()</a>. Но, не так давно, появилась возможность определять константы с помощью ключевого слова <a target="_blank" href="http://php.net/manual/ru/language.oop5.constants.php">const</a>. Так как же будет правильней?</p>
<p>Ответ скрывается в небольшой разнице между этими двумя методами.</p>
<p>define() определяет константу во время работы скрипта, тогда как const определяет константу в момент компиляции, что дает const очень незначительное преимущество в скорости.</p>
<p>define() кладет константу в глобальную область видимости, хотя, вы можете добавить в нее namespace. Это значит, что вы не сможете использовать define() для определения констант класса.</p>
<p>define() позволяет использовать выражения и в названии константы и в значении. Тогда как const не позволяет ни там ни там. Что делает define() гораздо более гибким.</p>
<p>define() может быть вызвано в условном (if) блоке, тогда как const в условном блоке выдаст ошибку.</p>
<h3>Пример: </h3>
<pre class="brush: php">
&lt;?php
// Проверим, как оба метода работают с пространством имен
namespace MiddleEarth\Creatures\Dwarves;
const GIMLI_ID = 1;
define('MiddleEarth\Creatures\Elves\LEGOLAS_ID', 2);
 
echo(\MiddleEarth\Creatures\Dwarves\GIMLI_ID);  // 1
echo(\MiddleEarth\Creatures\Elves\LEGOLAS_ID);  // 2; Обратите внимание, мы использовали define(), но пространство имен работает корректно.
 
// Теперь, давайте немного нестандартным образом определим константы, описывающие путь до Мордера:
define('TRANSPORT_METHOD_SNEAKING', 1 << 0); // OK!
const TRANSPORT_METHOD_WALKING = 1 << 1; //Ошибка компиляции! const не может использовать выражение в качестве константы.
 
// Далее, константы в условном блоке.
define('HOBBITS_FRODO_ID', 1);
 
if($isGoingToMordor){
    define('TRANSPORT_METHOD', TRANSPORT_METHOD_SNEAKING); // OK!
    const PARTY_LEADER_ID = HOBBITS_FRODO_ID // Ошибка компиляции: const не может использоваться в условном блоке
}
 
// И наконец, константа класса
class OneRing{
    const MELTING_POINT_DEGREES = 1000000; // OK!
    define('SHOW_ELVISH_DEGREES', 200); // Ошибка компиляции: define() нельзя использовать внутри класса
}
?>
 </pre>
  <p>Учитывая, что define(), несомненно более гибок, именно его вы и должны использовать. если только для вас не критичны константы классов. Использование const обычно способствует лучшей читаемости кода, но за счет гибкости.</p>
  <ul>
    <li><a target="_blank" href="http://stackoverflow.com/questions/2447791/define-vs-const">Stack Overflow: define() или const?</a> [eng]</li>
    <li><a target="_blank" href="http://www.php.net/manual/ru/language.constants.syntax.php">PHP Manual: Константы</a></li>
    <li><a target="_blank" href="http://stackoverflow.com/questions/1225082/define-vs-variable-in-php">Stack Overflow: define() или переменные</a> [eng]</li>
  </ul>
  <hr />
</section>

<section id="opcode">
  <h2>Кэширование в PHP</h2>
  <div class="alert alert-info">Используйте APC</div>
  <p>При стандартной инсталляции PHP, все скрипты компилируются и запускаются каждый раз при обращении. Трата времени на компиляцию одного и того же скрипта снова и снова, приводит к проблемам производительности на больших сайтах.</p>
  <p>Решение - opcode кэшер. opcode кэшер - это система, запоминающая скомпилированные версии каждого скрипта, так что, серверу нет нужды, каждый раз, снова и снова их компилировать. Обычно, она так же достаточно умна, что бы определить, был ли скрипт изменен, и вам не нужно вручную сбрасывать кэш, если вы изменили исходный код.</p>
  <p>Для PHP есть несколько решений:  <a target="_blank" href="http://eaccelerator.net/">eaccelerator</a>, <a target="_blank" href="http://xcache.lighttpd.net/">xcache</a> и <a target="_blank" href="http://www.php.net/manual/ru/book.apc.php">APC</a>. APC официально поддерживается проектом PHP, плюс, он самый распространенный. Также APC предоставляет постоянное key-value хранилище данных. Учитывая все это, именно его вы должны использовать. </p>
  <h3>Устанока APC</h3>
  <pre>sudo apt-get install php-apc</pre>
  <p>Никакой дополнительной конфигурации не требуется.</p>
  <h3>Использование APC как key-value хранилище</h3>
  <p>APC также предоставляет  memcached-подобную функциональность, прозрачно для ваших скриптов. Большой плюс использования APC вместо memcached в том, что APC интегрирован в ядро PHP, и вам не нужно больше ничего устанавливать и поддерживать на сервере. С другой стороны, APC не распределенный кэш, если вам нужна эта возможность - используйте memcached.</p>
  <h3>Пример</h3>
  <pre class="brush: php">
&lt;?php
// Сохраняем некоторые значения в APC кэш.  Мы также можем передать время жизни, однако, этом примере, значения будут жить пока ими не заинтересуется сборщик мусора APC.
apc_store('username-1532', 'Frodo Baggins');
apc_store('username-958', 'Aragorn');
apc_store('username-6389', 'Gandalf');
 
// После сохранения этих значений, любой PHP скрипт имеет к ним доступ, и не важно когда он был запущен!
$value = apc_fetch('username-958', $success);
if($success === true)
    print($value); // Aragorn
 
$value = apc_fetch('username-1', $success); // $success будет установлен в false, т.к. такого ключа не существует.
if($success !== true) // Примите к сведению !== проверяет на настоящий false, а не ложные, как например 0 или пустая строка.
    print('Key not found');
 
apc_delete('username-958'); // Этот ключ отныне недоступен.
?>
  </pre>
  <h3>Подводные камни</h3>
  <p>Если вы не используете PHP-FPM (например используете <a target="_blank" href="http://stackoverflow.com/questions/2712825/what-is-mod-php">mod_php</a> или <a target="_blank" href="http://www.fastcgi.com/mod_fastcgi/docs/mod_fastcgi.html">mod_fastcgi</a>), каждый PHP процесс будет использовать свой уникальный APC инстанс, включая хранилище. Это может привести к проблемам с синхронизацией в вашем коде, если вы не будете осторожны.</p> 
  <h3>Что почитать</h3>
  <ul>
    <li><a target="_blank" href="http://www.php.net/manual/ru/book.apc.php">PHP Manual: APC</a></li>
  </ul>
  <hr />
</section>

<section id="memcached">
  <h2>PHP и Memcached</h2>
  <div class="alert alert-info">Если вам нужен распределенный кэш, используйте библиотеку  Memcached. В остальных случаях используйте APC.</div>
  <p>Кэширование, часто, может улучшит производительность ваших приложений. Memcached - популярный выбор, который работает с многими языками, в том числе и с PHP.</p>
   <p>Тем не менее, когда нужно обратится к Memcached серверу из PHP скрипта, у вас есть две различные, <span style="text-decoration:line-through">и очень глупо названные</span> библиотеки:  <a target="_blank" href="http://www.php.net/manual/ru/book.memcache.php">Memcache</a> и <a href="http://www.php.net/manual/ru/book.memcached.php" target="_blank">Memcached</a>. Это две разные библиотеки с почти одинаковым именем, и обе используются для доступа к инстансу Memcached.</p>
   <p>Библиотека Memcached - имеет лучшую реализацию протокола Memcached. Она содержит несколько полезных возможностей, которых нет в Memcache, и похоже, что ее разработка идет активнее.</p>
   <p>Тем не менее, если вам не нужен доступ к инстансу Memcached из нескольких распределенных серверов, используйте APC. APC поддерживается проектом PHP, имеет практически ту же функциональность, что и Memcached, и дополнительный бонус, в виде opcode кэширования, который улучшит производительность ваших скриптов.</p>
   <h3>Установка библиотеки Memcached</h3>
   <p>После установки Memcached server, вам нужно установить также клиентскую библиотеку Memcached. Без нее, ваши php скрипты не смогут взаимодействовать с Memcached сервером.</p>
   <h3>Что почитать</h3>
   <ul>
    <li><a target="_blank" href="http://www.php.net/manual/ru/book.memcached.php">PHP Manual: Memcached</a></li>
    <li><a target="_blank" href="http://www.php.net/manual/ru/book.apc.php">PHP Manual: APC</a></li>
    <li><a target="_blank" href="http://stackoverflow.com/questions/1442411/when-should-i-use-memcache-instead-of-memcached">Stack Overflow: Memcache или Memcached в PHP</a> [eng]</li>
    <li><a target="_blank" href="http://stackoverflow.com/questions/815041/memcached-vs-apc-which-one-should-i-choose">Stack Overflow: Memcached или APC, что выбрать?</a> [eng]</li>
  </ul>
  <hr />
</section>

<section id="regex">
  <h2>PHP и regex</h2>
  <p>В PHP есть два способа использовать регулярные выражения: <a target="_blank" href="http://www.php.net/manual/ru/book.pcre.php">PCRE</a> (preg_*) функции, и <a target="_blank" href="http://www.php.net/manual/ru/book.regex.php">POSIX</a> (ereg_*) функции. Каждое семейство использует немного различный букет регулярных выражений. К счастью для нас, расширение POSIX было помечено как устаревшее в версии PHP 5.3.0. Так что, вы никогда не должны писать код, использую POSIX функции. Всегда используйте PCRE функции, они же preg_* функции.
</p>
   <ul>
    <li><a target="_blank" href="http://www.php.net/manual/ru/book.pcre.php">PHP Manual: PCRE</a></li>
    <li><a target="_blank" href="http://www.noupe.com/php/php-regular-expressions.html">Разбираемся в регулярных выражениях</a> [eng]</li>
  </ul>
  <hr />
</section>

<section>
  <h2>Запуск PHP на web-сервере</h2>
  <div class="alert alert-info">Используйте Use PHP-FPM</div>
  <p></p>
   <ul>
    <li><a target="_blank" href=""></a> [eng]</li>
    <li><a target="_blank" href=""></a></li>
    <li><a target="_blank" href=""></a> [eng]</li>
  </ul>
  <hr />
</section>

<!--
<section>
  <h2></h2>
  <div class="alert alert-info"></div>
  <p></p>
   <ul>
    <li><a target="_blank" href=""></a> [eng]</li>
    <li><a target="_blank" href=""></a></li>
    <li><a target="_blank" href=""></a> [eng]</li>
  </ul>
  <hr />
</section>
-->
</article>
</div>
</div>
</div>
 </body>