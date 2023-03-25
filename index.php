<?php
declare(strict_types=1);
 
namespace App;
 
/* 
include
include_once
require
require_once
*/

//$GET -zapytanie servera
//$POST- wyslanie od servera

 include_once('src/view.php');
include_once('./src/utilits/debug.php');
 
 
 
if(!empty($GET[`action`])){
    $action = $GET [`action`];
} else {
    $action = null;
}


$action = $_GET['action'] ??null;
$view = new View();
$view->render($action);
