<?php
session_start();

require __DIR__."/../core/Autholoader.php";

use core\Router;

Router::getInstance();