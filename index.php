<?php

declare(strict_types=1);

namespace App;
require_once('./Exception/AppException.php');
require_once('./Exception/StorageException.php');
require_once('./Exception/ConfigurationException.php');
include_once('./src/Controller.php');
include_once('./src/utils/debug.php');
require_once('./config/config.php');


use App\Exeption\AppException;
use App\Exeption\StorageException;
use App\Exeption\ConfigurationException;
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