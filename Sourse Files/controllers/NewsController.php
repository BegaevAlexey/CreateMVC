<?php

/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 22.05.17
 * Time: 10:14
 */
class NewsController
{
    public function actionIndex()
    {
        echo 'Список новостей';
        return true;
    }

    public function actionView()
    {
        echo 'Просмотр одной статьи';
        return true;
    }
}



