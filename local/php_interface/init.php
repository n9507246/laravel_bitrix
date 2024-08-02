<?php

use Illuminate\Database\Capsule\Manager as Capsule;

// Автозагрузка классов через Composer
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',  // или другой драйвер, например 'sqlite', 'pgsql', 'sqlsrv'
    'host'      => 'localhost',
    'database'  => 'sitemanager',
    'username'  => 'bitrix0',
    'password'  => 'Cuip0JVj-Om!gc)?M6w(',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Установить глобальный доступ к менеджеру
$capsule->setAsGlobal();

// Настроить Eloquent ORM
$capsule->bootEloquent();

require $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/eloquent.php';

// Проверяем, существует ли файл blade.php и подключаем его
$bladeFilePath = $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/blade.php';
if (file_exists($bladeFilePath)) {
    $GLOBALS['viewFactory'] = require $bladeFilePath;
} else {
    throw new Exception("Файл blade.php не найден по пути: " . $bladeFilePath);
}

// Определяем функцию view() аналогично Laravel
function view($template, $data = []) {
    if (isset($GLOBALS['viewFactory'])) {
        return $GLOBALS['viewFactory']->make($template, $data)->render();
    } else {
        throw new Exception("Ошибка инициализации Blade шаблонизатора");
    }
}

// Подключаем автозагрузчик Composer
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
