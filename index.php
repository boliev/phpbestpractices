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

<p>Это сборник вводных решений. Примеры должны показать вам правильный путь, настроить на правильный лад, но вы должны провести свой собственный ресерч, что бы превратить их во что-то полезное для вас.</p>

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
<div class="alert alert-info">PHP 5.4.9-4ubuntu2.3, установленная на Ubuntu 13.04</div>

<p>Обратите внимание, что на shared хостнгах, ваша конфигурация может ограничивать некоторые возможности. </p>

<p>Конечно, данные решения будут работать и на большинстве других, более старых версиях, но использовать ли их - решать только вам. В этом случае, необходимо выяснить все тонкости и возможные подводные камни применения этих решений на устаревших версиях PHP.</p>
<hr />
</section>
<section id="password_hashing">
<h2>Хранение паролей</h2>
<div class="alert alert-info">Используйте библиотеку <a href="http://www.openwall.com/phpass/">phpass</a> для хэширования и сравнения паролей.</div>
<div class="alert alert-warning">Проверенно на phpass 0.3</div>
<p>Хеширование - это стандартный способ защиты пользовательских паролей, перед сохранением их в базу. Множество обычных алгоритмов хэширования, как md5 и даже sha1 не безопасны для хранения паролей, т.к. хакеры могут легко взломать пароли, хэшированные данными алгоритмами(http://arstechnica.com/security/2013/05/how-crackers-make-minced-meat-out-of-your-passwords/). </p>

<p>Самый безопасный способ хэширования паролей - использование алгоритма bcrypt. Опенсорс библиотека  phpass предоставляет этот функционал в лекгком в использовании классе. </p>
<h3>Пример:</h3>
<pre class="brush: php;">
&lt;?php
// Подключаем библиотеку phpass
require_once('phpass-0.3/PasswordHash.php');
 
$hasher = new PasswordHash(8, false);
 
// Хэщируем пароль.  $hashedPassword - строка в 60 символов.
$hashedPassword = $hasher->HashPassword('my super cool password');
 
// Теперь можно сохранить сожержимое $hashedPassword в вашей базе данных!
 
// Проверяем, ввел ли пользователь верный пароль, сравнивая то, что он ввел с нашим хэшем
$hasher->CheckPassword('the wrong password', $hashedPassword); // false
 
$hasher->CheckPassword('my super cool password', $hashedPassword); // true
?>
</pre>
<h3>Подводные камни</h3>
<p>Многие источники рекомендуют также солить пароль, перед хэшированием. Это отличная идея, и phpass уже использует соль для вашего пароля, как часть функции HashPassword(). Что означает, что вам не нужно солить его самостоятельно.</p>
<h3>Что почитать:</h3>
<ul>
<li><a href="#">phpass</a></li>
<li><a href="#">Why hashing passwords with md5 or sha is unsafe</a></li>
<li><a href="#">How to safely store a password</a></li>
</ul>
<hr />
</section>
<section id="mysql">
<h2>Работа с базой данных MySQL</h2>
<div class="alert alert-info">Используйте <a href="http://www.php.net/manual/ru/book.pdo.php">PDO</a> и его prepared синтаксис</div>
<p>Есть много способов работы с MySql в PHP. PDO (PHP Data Objects) - новейший и самый здравый из них. PDO имеет понятный интерфейс, работающий с множеством различный типов БД, используя объектно ориентированный подход, и поодерживая большинство возможностей, предлагаемых современными БД. </p>

<p>Вы должны использовать PDO prepared синтаксис, что бы предотвратить возможные атаки sql injection. Используя ф-цию bindValue() убедитесь что выш sql застрахован от атак sql injection первого порядка (Однако это не сто процентная защита). В прошлом, это достигалось комбинацией экранирующих функций. С PDO все гораздо легче.</p>
<h3>Пример:</h3>
<pre class="brush: php;">
&lt;?php
try{
    // Создаем новое подключение.
    // Вам наверно потребуется заменить название хоста на localhost в первом параметре.
    // Параметры PDO которые мы передаем, делают следующее:
    // PDO::ATTR_ERRMODE включает исключения для ошибок. Необязательно, но удобно.
    // PDO::ATTR_PERSISTENT Отключает постоянное соединение, которое, в некоторых случаях, может вызвать проблемы. См. "Подводные камни".
    // PDO::MYSQL_ATTR_INIT_COMMAND Уведомляет подлкулючение, что нужно передавать UTF-8 данные. Возможно вам это и не нужно, зависит от вашей конфигурации, но это избавит вас от головной боли, если вы пвтаетесь сохранить в базу строку UTF-8. См. "Подводные камни".
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
    // Если вы не уверены, число ли вы передаете, используйте функцию is_int().
    $handle->bindValue(1, 100, PDO::PARAM_INT);
    $handle->bindValue(2, 'Bilbo Baggins');
    $handle->bindValue(3, 5, PDO::PARAM_INT);
 
    $handle->execute();
 
    // Использование метода fetchAll() может быть достаточно тяжелым в плане ресурсов, если вы выбираете большое колличество строк.
    // В этом случае, можно использовать метод fetch() и обрабатывать каждую выбранную строку одну за одной.
    // Вы так же можете вернуть массивы и другие вещи, в том числе и объекты. Смотрите документаци PDO для более подробной информации.
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
<p>Если не передать параметр  PDO::PARAM_INT в методе bindValue() для чисел, PDO может обрамить их в кавычки, что может испортить некоторые запросы. См. Отчет об ошибке (https://bugs.php.net/bug.php?id=44639).</p>

<p>Отсутствие set names utf8mb4 в качестве вашего первого запроса, может стать причиной того, что unicode данные сохранятся в БД неверно. Это зависит от вашей конфигурации. Можете не делать этого, если абсолютно уверенны, что у вас все впорядке.</p>

<p>Включение постоянного соединения, может привести к непредсказуемым проблемам связанным с параллельными соединениями. Но это не прорблема PHP это проблема уровня приложения. Постоянное соединения безопасно использовать до тех пор, пока вы осознаете последствия. См. вопрос на  Stack Overflow http://stackoverflow.com/questions/3332074/what-are-the-disadvantages-of-using-persistent-connection-in-pdo</p>

<p>Даже если вы используете ‘set names utf8mb4’ убедитесь, что в вашей БД таблицы в кодировке utf8mb4.</p>

<p>Вы можете использовать больше чем один запрос в execute(), если разделить из точкой с запятой, но опасайтесь бага (https://bugs.php.net/bug.php?id=61207), который не пофиксен в нашей версии php. </p>
<h3>Что почитать.</h3>
<ul>
<li><a href="#">PHP Manual: PDO</a></li>
<li><a href="#">Why you should be using PHP's PDO for database access</a></li>
<li><a href="#">Stack Overflow: PHP PDO vs normal mysql_connect</a></li>
<li><a href="#">Stack Overflow: Are PDO prepared statements sufficient to prevent SQL injection?</a></li>
<li><a href="#">Stack Overflow: SET NAMES utf8 in MySQL?</a></li>
</ul>
<hr />
</section>
</article>
</div>
</div>
</div>
 </body>