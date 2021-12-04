<?php

namespace controllers;

use models\MainPageModel;
use core\Controller;

/**
 * Класс для работы с методами страницы
 */
class MainPageController extends Controller
{

    public MainPageModel $mainPageModel;

    public function __construct()
    {
        parent::__construct();
        $this->mainPageModel = new MainPageModel();
    }

    /**
     * Отображение главной страницы проекта
     */
    public function getMainPage()
    {
        $this->view->mainPage();
    }

    /**
     * Возвращение данных об ошибках валидации или успешном занесении
     */
    public function writeData()
    {
        return $this->mainPageModel->checkValuesAndSet($_POST['arr']);
    }
}