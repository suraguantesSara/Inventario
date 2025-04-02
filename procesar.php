<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conexion = new mysqli("sql109.infinityfree.com", "if0_38651999", "TU_CONTRASEÑA", "if0_38651999_inventario_db");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$producto = $_POST['producto'] ?? null;
$tipo_movimiento = $_POST['tipo_movimiento'] ?? null;
$cantidad = $_POST['cantidad'] ?? null;

// Validar que los datos no sean nulos
if (!$producto || !$tipo_movimiento || !$cantidad) {
    die("❌ Error: Faltan datos en el formulario.");
}

// Registrar movimiento en la base de datos
$consulta_movimiento = "INSERT INTO Movimientos (id_material, tipo_movimiento, cantidad, fecha) 
                        VALUES ('$producto', '$tipo_movimiento', '$cantidad', NOW())";

if ($conexion->query($consulta_movimiento) === TRUE) {
    echo "✅ Movimiento registrado correctamente.";
} else {
    die("❌ Error al insertar movimiento: " . $conexion->error);
}

// Actualizar saldo del material
if ($tipo_movimiento == "entrada") {
    $consulta_saldo = "UPDATE Materiales SET saldo_actual = saldo_actual + $cantidad WHERE d_materialPrimaria = '$producto'";
} else {
    $consulta
