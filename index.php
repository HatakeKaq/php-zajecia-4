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
    $page= 'create';
    $created = false;

if(!empty($_POST)){
   $viewParams = [
    'title' => $_POST['title'],
    'description' => $_POST['description'],
   ];
   $created = true;
}
$vieParams['created']=$created;

}
else{
    $page = 'list';
}



$view = new View();
$view->render($action,$viewParams);
