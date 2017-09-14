<?php
session_start();    //Start session
date_default_timezone_set("Asia/Ho_Chi_Minh");  //set default time zone

define('ROOT', dirname(realpath(__FILE__)) . "/");   //define root directory
define('DIR_UPLOAD', ROOT . 'public/uploads/');           //define upload diretory

/*
 * load config files and function common
 */
require_once(ROOT . 'system/configs/config.php');
require_once(ROOT . 'lib/functions.php');

// Get url
$url = empty($_GET['url']) ? '' : $_GET['url'];

//define base url
$host = $_SERVER['HTTP_HOST'];
$self = $_SERVER['PHP_SELF'];
$arrayUrl = array();
$arrayUrl = explode('/', $self);
$base_url = "http://" . $host;
define('BASE_URL', 'http://kiemtra.dev');

/*
 * Function load controller and action
 */
function load()
{
    global $url;
    global $area;
    $url = rtrim($url, "/");
    $urlArray = explode("/", $url);

//    if(isset($urlArray[2]) && $urlArray[2] == 'logout'){
//        setcookie('username');
//        echo "!";
//        exit();
//        session_destroy();
//        redirect(BASE_URL . "1");
//    }

    $controller = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;

    if ($urlArray[0] == "admin") {
        $area = "admin";
        array_shift($urlArray);
    }


    if (!empty($urlArray[0])) {
        $controller = array_shift($urlArray);
    }

    if (!empty($urlArray[0])) {
        $action = array_shift($urlArray);
    }

    $controller = ucwords($controller);
    $controller .= 'Controller';

    if (!class_exists($controller)) {
        echo "Class " . $controller . " not found";
    }

    $class = new $controller();

    if (method_exists($controller, $action)) {
        call_user_func(array($class, $action));
    } else {
        echo "Method " . $action . " not found";
    }

}

/*
 * Function autoload class
 */

function __autoload($className)
{
    $paths = array(
        ROOT . "/lib/",
        ROOT . "/admin/controller/",
        ROOT . "/admin/model/",
    );

    foreach ($paths as $path) {
        if (file_exists($path . $className . ".php")) {
            require_once($path . $className . ".php");
            break;
        }
    }
}

Database::getInstance('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$area = "admin";
load();