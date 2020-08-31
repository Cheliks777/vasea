<?php
/********************************************\
| Telegram-канал: https://t.me/z_tds         |
| Вход в админку: admin.php (admin/admin)    |
| Сгенерировать хэш MD5: application/md5.php |
\********************************************/
if(!defined("INDEX")){header('HTTP/1.1 403 Forbidden'); die('403 Forbidden');}
date_default_timezone_set('Europe/Moscow');//временная зона (http://php.net/manual/ru/timezones.php)
$login = 'admin';//логин
$pass = '21232f297a57a5a743894a0e4a801fc3';//пароль в md5
$admin_page = 'admin.php';//название файла админки (если будете менять не забудьте переименовать сам файл!)
$api_key = 'LmRe4q';//API ключ ([a-Z0-9] (не забудьте его прописать в api.php)
$api_file = 'api.php';//название файла API (api.php)
$postback_key = 'ShJi8y';//postback ключ
$ip_allow = '';//разрешить доступ к админке только с этого IP. Оставьте пустым если блокировка по IP не нужна
$auth = 1;//использовать для авторизации куки или сессии (0/1)
$language = 'ru';//язык (ru/uk/en)
$folder = '';//для работы zTDS в папке укажите ее название, например $folder = 'folder'; или $folder = 'folder1/folder2'; если папка в папке
$trash = 0;//0 - белая страница (200 OK); 1 - HTTP редирект ($trash_url); 2 - 403 Forbidden; 3 - 404 Not Found;
$trash_url = 'http://www.ru';//url куда будем сливать весь мусор (переходы в несуществующие группы)
$ini_folder = 'ini';//название папки с файлами .ini
$keys_folder = 'keys';//название папки для сохранения ключевых слов (http://tds.com/keys)
$log_folder = 'log';//название папки с логами (http://tds.com/log)
$log_period = 14;//хранить логи за последние 14 дней
$log_limit = 500;//показывать первые 500 записей при просмотре логов
$log_bots = 1;//сохранять в логах ботов (0/1)
$log_ref = 1;//сохранять в логах рефереры (0/1)
$log_ua = 1;//сохранять в логах юзерагенты (0/1)
$log_key = 1;//сохранять в логах ключевые слова (0/1)
$log_fs = 15;//размер шрифта в логах
$log_out = 'api,iframe,javascript,show_page_html,show_text';//не сохранять в логах ауты для этих типов редиректа
$columns_log = array("ID"=>1,"Time"=>2,"Group"=>4,"Stream"=>3,"Out"=>3,"Key"=>3,"Redirect"=>4,"Device"=>2,"WAP"=>1,"Country"=>1,"City"=>2,"Region"=>3,"Lang"=>4,"Uniq"=>1,"Bot"=>1,"IP"=>1,"Domain"=>1,"Referer"=>3,"UA"=>3,"SE"=>2,"Postback"=>1);//чем меньше число, тем важнее отображение столбца в логах на маленьких экранах. Очередность имеет значение, ее можно менять.
$columns_source = array("Sources"=>1,"Visitors"=>1,"Unique"=>1,"SE"=>1,"WAP"=>1,"Computers"=>0,"Tablets"=>0,"Phones"=>0);//столбцы в "Источниках". 0 - скрыть; 1 - показать;
$index = 2;//0 - не создавать индексы; 1 - создавать только для движка; 2 - создавать для движка и админки;
$chart_bots = 1;//показывать статистику ботов в графиках (0/1)
$n_cookies = 'qwerty';//название cookies (измените)
$get_ex = 'ex';//название переменной GET с запакованными дополнительными параметрами
$get_key = 'q';//название переменной GET в которой передается ключевое слово
$protect = 1;//0 - отключено; 1 - каптча; 2 - google authenticator;
$totp = 'key.dat';//при использовании google authenticator обязательно переименуйте
$cid_length = 10;//длина CID для постбэка
$cid_delimiter = ';';//разделитель данных внутри CID
$remote_ip_ch_url = '';//url сервиса проверки IP
$remote_ip_ch_sign = '';//признак бота
$update_ip_url = 'http://ru.myip.ms/files/bots/live_webcrawlers.txt';//ссылка на список IP ботов (зеркало: http://ztds.info/bots/webcrawlers.dat)
$update_ip = 0;//тип обновления IP ботов (0 - удалить старые IP и сохранить новые; 1 - добавить новые IP к старому списку)
$vt_key = '';//API ключ от VirusTotal
$tlg_bot_token = '';//ключ (токен) авторизации для Telegram бота
$tlg_chat_id = '';//ID аккаунта в Telegram
$curl_cache = 60;//кэшировать данные в течении 60 минут (тип редиректа CURL)
$curl_ua = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0';//useragent для CURL
$disable = 0;//отключить TDS (0/1)
$error_log = 1;//сохранение ошибок PHP в файле err.log (0/1)
$display_errors = 0;//вывод ошибок PHP на экран (0/1)
/*Ниже ничего не изменяйте*/
$debug = 0;//режим отладки, отключает проверку ключа API
$timeout_1 = 300000;//SQLite busyTimeout в index.php (в миллисекундах)
$timeout_2 = 60000;//SQLite busyTimeout в админке (в миллисекундах)
$max_ex_time = 180;//max_execution_time в index.php (в секундах)
$empty = '-';
$version = 'v.0.8.1';
@error_reporting(-1);
if($error_log == 1){
	@ini_set('log_errors', 1);
	@ini_set('error_log', 'err.log');
}
if($display_errors == 1){
	@ini_set('display_errors', 1);
}
else{
	@ini_set('display_errors', 0);
}
?>