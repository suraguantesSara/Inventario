<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// URL del Google Apps Script (reemplázala con la URL pública de tu script)
$url = "https://script.google.com/macros/s/TU_URL_DEL_SCRIPT/exec";  

$datos = json_encode([
    "producto" => $_POST["producto"],
    "tipo_medida" => $_POST["tipo_medida"],
    "entrada_salida" => $_POST["entrada_salida"],
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

// Respuesta para confirmar que los datos fueron enviados
echo "✅ Datos enviados a Google Sheets.";
?>
