<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = "https://script.google.com/macros/s/AKfycbzRO7aDjWQ76e23GZy8mF0EH912TJDS3h2WejCUk3e3ownvXMrnZjPpjZmLhBlylb20/exec";

// Si la solicitud es POST, envía datos a Google Sheets
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_encode([
        "producto" => $_POST["producto"] ?? "",
        "tipo_medida" => $_POST["tipo_medida"] ?? "",
        "entrada_salida" => $_POST["tipo_movimiento"] ?? "",
        "cantidad" => $_POST["cantidad"] ?? "",
        "fecha" => $_POST["fecha"] ?? "",
        "observaciones" => $_POST["observaciones"] ?? ""
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

    echo json_encode(["status" => "success", "message" => "✅ Datos guardados correctamente en Google Sheets.", "response" => $response]);
    exit;
}

<?php
header('Content-Type: application/json');
include 'conexion.php'; // Asegúrate de que la conexión esté bien configurada

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

