<?php
header("Content-Type: application/json"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = "https://script.google.com/macros/s/AKfycbzRO7aDjWQ76e23GZy8mF0EH912TJDS3h2WejCUk3e3ownvXMrnZjPpjZmLhBlylb20/exec"; // URL de Apps Script

$response = file_get_contents($url);

echo $response; // Devuelve los datos en formato JSON
?>
