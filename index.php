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
 
include_once('./src/utilits/debug.php');
 
 
 
if(!empty($GET[`action`])){
    $action = $GET [`action`];
} else {
    $action = null;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<header>
    <h1> Moje Notatki<h1>
</header>

<main>
    <nav>
        <ul>
            <li> <a href="/">Lista notatek</a></li>
            <li> <a href ="/?action=create">Nowa notatka</a></li>
        </ul>
    </nav>
    <article>
        <?php if ($action===`create`) :?>
            <h3>Nowa Notatka</h3>
        <?php else :?>
            <h3>Lista notaek</h3>
        <?php endif; ?>
    </article>


</main>

<footer> Stopka</footer>
    
</body>
</html>

