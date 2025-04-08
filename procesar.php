<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = "https://script.google.com/macros/s/AKfycbzRO7aDjWQ76e23GZy8mF0EH912TJDS3h2WejCUk3e3ownvXMrnZjPpjZmLhBlylb20/exec";  

$datos = json_encode([
    "producto" => $_POST["producto"],
    "tipo_medida" => $_POST["tipo_medida"],
    "entrada_salida" => $_POST["tipo_movimiento"],
    "cantidad" => $_POST["cantidad"],
    "fecha" => $_POST["fecha"],
    "observaciones" => $_POST["observaciones"]
]);

$opciones = [
    "http" => [
        "header" => "Content-Type: application/json",
        "method" => "POST",
        "content" => $datos
    ]
];

$contexto = stream_context_create($opciones);
$response = file_get_contents($url, false, $contexto);

echo "✅ Respuesta del servidor: " . $response;
?>
