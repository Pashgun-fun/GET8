<?php

namespace core;

use core\View;

/**
 * Модель в которую складываются все общие методы для контроллеров
 */
class Controller
{

    protected View $view;

    function __construct()
    {
        $this->view = new View();
    }

}