<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 19.05.17
 * Time: 15:23
 */

return [
    // Эти правила должны быть выше, т.к. перебор массива идет на совпадение
    'news/77' => 'news/view',
    'news/15' => 'news/view',

    'news' => 'news/index',         //actionIndex в NewController
    'products' => 'product/list'    //actionList в ProductController
];