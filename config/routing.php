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

 // try to get geoloc of user to guess his country and then display accurated flag
$response = file_get_contents("http://ip-api.com/json");
$response = json_decode($response);
$cc = $response->countryCode;

$photoInPDF = !in_array($cc, ['US', 'CA']);

$routeParts = explode('/', ltrim($_SERVER['PHP_SELF'], '/'));
array_shift($routeParts);

if($routeParts==['fr']){
    echo $twig->render('idioms/french.twig', ['cc' => $cc, 'photoInPDF' => true]);
} elseif (empty($routeParts)){
    echo $twig->render('idioms/english.twig', ['cc' => $cc, 'photoInPDF' => $photoInPDF]);
} else {
    // header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
    exit();
}