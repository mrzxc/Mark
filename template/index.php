<?php
include './Class/tempOut.class.php';
include './Model/Sql.php';
if (preg_match('/^s=/', $_SERVER["QUERY_STRING"])) {
    $str = substr($_SERVER["QUERY_STRING"], 2);
    $arr = explode('&', $str);
    $arr1 = explode('/', $arr[0]);
    define('CONTROLLER', $arr1[0].'Controller');
    define('METHOD', $arr1[1]);
    if(!empty($arr1[2]))
    define('TEAMID', $arr1[2]);
    include "./Controller/".CONTROLLER.'.php';
    $class = CONTROLLER;
    $controller = new $class();
    $method = METHOD;
    $controller->$method();
}
 ?>