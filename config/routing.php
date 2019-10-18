<?php
/**
 * This file dispatch routes.
 *
 * PHP version 7
 *
 * @author   WCS <contact@wildcodeschool.fr>
 *
 * @link     https://github.com/WildCodeSchool/simple-mvc
 */

$routeParts = explode('/', ltrim($_SERVER['PHP_SELF'], '/'));
array_shift($routeParts);

if($routeParts==['fr']){
    echo $twig->render('idioms/french.twig');
} elseif (empty($routeParts)){
    echo $twig->render('idioms/english.twig');
} else {
    // header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}