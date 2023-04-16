<?php

declare(strict_types=1);

namespace App;
require_once('./Exeption/AppExeption.php');
require_once('./Exeption/StorageExeption.php');
require_once('./Exeption/ConfigurationExeption.php');
include_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');


use App\Exeption\AppExeption;
use App\Exeption\StorageExeption;
use App\Exeption\ConfigurationExeption;
use Throwable;



$request= [
    'get'=>$_GET,
    'post'=>$_POST,
];



try{

Controller::initConfiguration($configuration);
$controller = new Controller($request);
$controller->run();
}
catch(AppExeption $e){
    echo "<h1>Wystapil blad w aplikacji!</h1>";
    echo '<h3>'.$e->getMessage().'</h3>';
    dump($e);
    }
    catch(Throwable $e){
        echo "<h1>Wystapil blad w aplikacji!</h1>";
        dump($e);
    }