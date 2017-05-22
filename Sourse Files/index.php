<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 19.05.17
 * Time: 14:22
 */

// FRONT CONTROLLER, в нашем случае это index.php


// 1.Общие настройки
// Общее отображение ошибок на вермя разработки сайта
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2.Поключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Router.php');


// 3.Установка соединения с БД


// 4.Вызов Router
$router = new Router();
$router ->run();