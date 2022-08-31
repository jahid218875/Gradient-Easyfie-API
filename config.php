<?php
require 'vendor/autoload.php';

$easyfie = new \EasyFie\EasyFie();


$user = "fabian25_838";
$pass = sha1("easy115599");

$token = $easyfie->getToken($user, $pass)->access_token;
$me = $easyfie->Me($token);


$web_data =  $easyfie->WebData($token);


$categories = $easyfie->getAllCategories($token);

$themes_color = $easyfie->getThemesColor($token);

$generated_page = $easyfie->generatedPages($token);

$meta = $easyfie->getMetaData($token);

?>