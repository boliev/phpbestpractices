<!DOCTYPE html>
<html lang="en">
 	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  		<title>PHP Best Practices | PHP лучшие решения</title>
  		<link href="/css/bootstrap.min.css" rel="stylesheet">
  		<link href="/css/style.css" rel="stylesheet">
  		<script src="/js/jquery-2.0.3.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$(function(){
			$('body').scrollspy();
		});
		</script>
	</head>
<body data-spy="scroll" data-target="#navbar">

<div class="row">
<div class="col-md-3">
<nav class="bs-sidebar hidden-print affix" role="complementary" id="#navbar">
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

<div class="col-md-9">
<article>
<section id="introduction">
<h2>Введение</h2>
PHP сложный язык, за долгие годы существования, прошедший огонь, воду и медные трубы. Он крайне непоследователен, в нем нередко встречаются баги. Каждая версия имеет свои собственные уникальные возможности и причуды, и часто, очень трудно отслеживать, какая версия имела какие проблемы. Легко понять, почему некоторые, так сильно его ненавидят.
 
Несмотря на это, на сегодняшний день PHP самый популярный язык для веб разработки. Из-за его длинной истории, вы найдете в сети много туториалов, как сделать на нем основные вещи, типа хэширование паролей или доступ к БД. Проблема в том, что из пяти туториалов, все пять могут описывать совершенно разные способы что-то сделать. Какой-же выбрать? Какие есть тонкости и подводные камни? Это действительно не просто понять, и вам придется провести в интернете не один час, что бы выяснить это. 

Это еще одна причина, почему новичков в PHP программировании, так часто обвиняют в некрасивом, устаревшем и небезопасном коде. Часто, первый ответ гугла выдает ссылку на четырех-летнюю статью, описывающую методы пятилетней давности. 

Этот документ создан для таких случаев. Это попытка собрать набор основных best practices для основных и запутанных вопросов в PHP. Если задача имеет несколько подходов, вы найдете ее здесь.
</section>
<section id="whatisthat">
<h2>Что это?</h2>
Это гайд, предлагающий лучшее решение задач, с которыми может столкнуться PHP программист, в случаях, когда PHP предлагает несколько разных решений. Например: работа с БД - это обычная задача, имеющая огромное колличество возможных решений на PHP, но не все из них правильные. 

Это серия вводных решений. Примеры должны показать вам правильный путь, настроить на правильный лад, и вы должны провести свой собственный ресерч, что бы превратить из в нечто полезное для вас.

Здесь описывается то, что мы считаем состоянием просветления в PHP. Однако, это значит, что если вы используете устаревшую версию PHP, некоторые примеры работать не будут. 
</section>
<section id="whatisnot">
<h2>Чем это не является?</h2>
Это не PHP туториал. Основы м синтаксис PHP нужно учить где-то в другом месте. Это не гайд по основным задачам веб приложений, как то: хранение куки, кэширование, стиль кода, документация и т.д.
Это не гайд по безопасности. Хотя тут затрагиваются некоторые проблемы безопасности, вам все же нужно провести собственный ресерч на тему безопасности, что бы защитить свои приложения. В частности, вы должны внимательно проверить все решения представленные здесь, перед тем, как их использовать. Ваш код - только на вашей совести. 

Это не пропаганда определенного стиля кода, шаблона или фреймворка.

Это не пропаганда способа реализации высокоуровневых задач, как например: регистрация пользователей, сисема входа и т.д. Этот документ строго про низкоуровневые задачи.

Это нивкоем случае не единственно верные решения. Некоторые из приведенных ниже решений, могут не подходить для конкретно вашей ситуации, и есть множество других путей, для достижения тех же целей. В частности, для высоконогруженных веб-приложений, больше выгоды могут принести какие-либо не очевидные решения, известные только гуру.
</section>
<section id="phpversion">
<h2>Какую версию PHP мы используем.</h2>
PHP 5.3.10-1ubuntu3.6 with Suhosin-Patch, установленную на Ubuntu 12.04 LTS.

PHP это столетняя черепаха веб индустрии. Ее панцирь украшен историей, богатой, замысловатой и угловатой историей. 

В окружении shared хостнга, его конфигурация может ограничивать некоторые возможности. 

Для того, что бы сохранить хоть клачек здравомыслия, мы сосредоточимся всего на одной версии PHP. С 30 апреля 2013 года - эта версия PHP 5.3.10-1ubuntu3.6 with Suhosin-Patch. Это та версия php, которую вы установите, если используете apt-get в Ubuntu 12.04 LTS. Другими словами, это то, что использует большинство. 

Вы можете заметить, что некоторые решения работают и на других, более старых версиях, но использовать ли их на более старых версиях - решать только вам. В этом случае, вам необходимо провести ресерч, что бы узнать все тонкости и возможнве подводные камни применения этих решений на устаревших версиях php.
</section>
<section id="password_hashing">
<h2>Хранение паролей</h2>.
Используйте библиотеку  phpass (http://www.openwall.com/phpass/) для хэширования и сравнения паролей.
Проверенно на phpass 0.3
Хеширование - это стандартный способ защиты пользовательских паролей, перед сохранением их в базу. Множество обычных алгоритмов хэширования, как md5 и даже sha1 не безопасны для хранения паролей, т.к. хакеры могут легко взломать пароли, хэшированные данными алгоритмами(http://arstechnica.com/security/2013/05/how-crackers-make-minced-meat-out-of-your-passwords/). 

Самый безопасный способ хэширования паролей - использование алгоритма bcrypt. Опенсорс библиотека  phpass предоставляет этот функционал в лекгком в использовании классе. 
<h3>Пример:</h3>
<pre>
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
Многие источники рекомендуют также солить пароль, перед хэшированием. Это отличная идея, и phpass уже использует соль для вашего пароля, как часть функции HashPassword(). Что означает, что вам не нужно солить его самостоятельно.
Что почитать:
phpass
Why hashing passwords with md5 or sha is unsafe
How to safely store a password
</section>
<section id="mysql">
<h2>Работа с базой данных MySQL</h2>
Используйте PDO (http://www.php.net/manual/ru/book.pdo.php) и его prepared синтаксис
Есть много способов работы с MySql в PHP. PDO (PHP Data Objects) - новейший и самый здравый из них. PDO имеет понятный интерфейс, работающий с множеством различный типов БД, используя объектно ориентированный подход, и поодерживая большинство возможностей, предлагаемых современными БД. 

Вы должны использовать PDO prepared синтаксис, что бы предотвратить возможные атаки sql injection. Используя ф-цию bindValue() убедитесь что выш sql застрахован от атак sql injection первого порядка (Однако это не сто процентная защита). В прошлом, это достигалось комбинацией экранирующих функций. С PDO все гораздо легче.
<h2>Пример:</h2>
<pre>
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
Если не передать параметр  PDO::PARAM_INT в методе bindValue() для чисел, PDO может обрамить их в кавычки, что может испортить некоторые запросы. См. Отчет об ошибке (https://bugs.php.net/bug.php?id=44639).

Отсутствие set names utf8mb4 в качестве вашего первого запроса, может стать причиной того, что unicode данные сохранятся в БД неверно. Это зависит от вашей конфигурации. Можете не делать этого, если абсолютно уверенны, что у вас все впорядке.

Включение постоянного соединения, может привести к непредсказуемым проблемам связанным с параллельными соединениями. Но это не прорблема PHP это проблема уровня приложения. Постоянное соединения безопасно использовать до тех пор, пока вы осознаете последствия. См. вопрос на  Stack Overflow http://stackoverflow.com/questions/3332074/what-are-the-disadvantages-of-using-persistent-connection-in-pdo

Даже если вы используете ‘set names utf8mb4’ убедитесь, что в вашей БД таблицы в кодировке utf8mb4.

Вы можете использовать больше чем один запрос в execute(), если разделить из точкой с запятой, но опасайтесь бага (https://bugs.php.net/bug.php?id=61207), который не пофиксен в нашей версии php. 
<h3>Что почитать.</h3>
PHP Manual: PDO
Why you should be using PHP's PDO for database access
Stack Overflow: PHP PDO vs normal mysql_connect
Stack Overflow: Are PDO prepared statements sufficient to prevent SQL injection?
Stack Overflow: SET NAMES utf8 in MySQL?
</section>
</article>
</div>
</div>
 </body>