<?php

namespace core;

/**
 * Модель для подключения "вьюшек"
 */
class View
{
    public function mainPage()
    {
        include __DIR__ . "/../views/mainPage.php";
    }
}