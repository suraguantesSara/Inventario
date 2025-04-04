<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = "https://script.google.com/macros/s/TU_URL_DEL_SCRIPT/exec";  // Reemplaza con la URL pública del Apps Script

$datos = json_encode([
    "producto" => $_POST["producto"],
    "tipo_movimiento" => $_POST["tipo_movimiento"],
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
file_get_contents($url, false, $contexto);

echo "✅ Datos enviados a Google Sheets.";
