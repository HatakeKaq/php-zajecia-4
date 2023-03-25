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
 
 const DEFAULT_ACTION = 'list';

 $action = $_GET['action'] ??DEFAULT_ACTION;

 $viewParams=[];
 
if ($action ==='create')
{
    $viewParams ['resultCreate'] = 'Udało sie dodać notatke!';
}else{
    $viewParams['resultList']='Wyswietlamy liste notatek';
}



$view = new View();
$view->render($action,$viewParams);
