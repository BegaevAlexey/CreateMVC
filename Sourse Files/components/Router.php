<?php

/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 19.05.17
 * Time: 14:47
 */
class Router
{
    //массив, в котором хрониться маршрут
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    // Получает строку запроса
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            //trim - удаляет пробелы из начала и конца строки
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    //принимает управление от front controller
    /**
     *
     */
    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();

        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPatten => $path){
            // Сравниваем $uriPattern и $uri
            if (preg_match("-$uriPatten-", $uri)) {
                // Определить какой контроллер
                // и action обрабытывает запрос
                $segments = explode('/', $path);
                // Формируем имя контроллера
                $controllerName = array_shift($segments).'Controller';
                // Первую букву делаем заглавной
                $controllerName = ucfirst($controllerName);
                // Формируем экшен
                $actionName = 'action'.ucfirst(array_shift($segments));
                // Подключить файл класса-контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                // Создать обЪек, вызвать метод (т.е. action)
                // Вместо имени класса мы подставляем строку с названием класса
                $controllerObject = new $controllerName;
                // Вызываем экшен того класса, который мы вызвали
                $result = $controllerObject->$actionName();
                // В наших методах мы ворачива true, если метод найден, то поиск обрывается.
                if ($result != null) {
                    break;
                }

            }
        }



    }
}
