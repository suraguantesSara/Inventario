<?php
header("Content-Type: application/json"); 
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = "https://script.google.com/macros/s/AKfycbzRO7aDjWQ76e23GZy8mF0EH912TJDS3h2WejCUk3e3ownvXMrnZjPpjZmLhBlylb20/exec"; // URL de Apps Script

$response = file_get_contents($url);

echo $response; // Devuelve los datos en formato JSON



header('Content-Type: application/json');
include 'procesar.php'; // Asegúrate de que la conexión esté bien configurada

if (isset($_GET['producto'])) {
    $producto = $_GET['producto'];
    $consulta = $conn->prepare("SELECT * FROM inventario WHERE producto LIKE ?");
    $consulta->execute(["%$producto%"]);
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultado);
} else {
    // Si no se envía ningún producto específico, mostramos todos los registros
    $consulta = $conn->query("SELECT * FROM inventario");
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
}
?>
