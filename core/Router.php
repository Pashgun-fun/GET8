<?php

namespace core;

use controllers\MainPageController;


/**
 * Модель для обработки всех путей, которые приходят из ajax
 */
class Router
{
    protected static ?Router $instance = null;

    function __construct()
    {
        $this->run();
    }

    /**
     * Принцип singleton
     * Суть такая, что если объект уже существует при повторном его вызове не будет
     * создаваться новый объект, а будет работа с тем же
     */
    public static function getInstance(): Router
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Метод обрабатывающий в себе все URL
     */
    public function run()
    {
        switch ($_SERVER['REQUEST_URI']){
            case "/":
                $mainPageController = new MainPageController();
                $mainPageController->getMainPage();
                break;
            case "/api/info/send":
                $mainPageController = new MainPageController();
                $mainPageController->writeData();
                break;
        }
    }

}