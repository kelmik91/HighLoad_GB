<?php

require_once('vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

error_reporting(E_ALL);
ini_set('display_errors', 1);

function req() {
	echo "1";
	req();
}
 req();

$memory = memory_get_usage();

$log = new Logger('main');
$log->pushHandler(new StreamHandler('log/my.log', Logger::DEBUG));

$start_time = round(microtime(), 5);

$log->debug('Память перед циклом: ' . $memory);

$log->warning('Начало выполнение цикла!');

for ($i=0; $i < 5; $i++) { 

	if ($i == 3) {
		trigger_error("В этом месте ошибка!");
	}

	echo "Сервер работает " . $i . "<br>";

	$log->notice('Текущая память: ' . $memory);
	$log->notice('Изменение памяти: ' . ($memory - memory_get_usage()));
	$memory = memory_get_usage();

	$log->warning("Итерация цикла №{$i} заверщена");
}

$log->warning('Цикл заверщён!');
$log->notice('Память после цикла: ' . $memory);
$log->notice('Изменение памяти: ' . ($memory - memory_get_usage()));

$log->debug('Память в пике: ' . memory_get_peak_usage());
echo memory_get_peak_usage() . " байт памяти в пике <hr>";

$stop_time = round(microtime(), 5);

$time = $stop_time - $start_time;

echo 'Время выполнения: ' . $time . "<hr>";

$log->debug('Время выполнения скрипта ' . round($time, 5));
