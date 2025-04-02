<?php
$conexion = new mysqli("sql109.infinityfree.com", "if0_38651999", "TU_CONTRASEÑA", "if0_38651999_inventario_db");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

$producto = $_POST['producto'];
$tipo_movimiento = $_POST['tipo_movimiento'];
$cantidad = $_POST['cantidad'];

// Registrar movimiento
$consulta_movimiento = "INSERT INTO Movimientos (id_material, tipo_movimiento, cantidad, fecha) VALUES ('$producto', '$tipo_movimiento', '$cantidad', NOW())";
$conexion->query($consulta_movimiento);

// Actualizar saldo del material
if ($tipo_movimiento == "entrada") {
    $consulta_saldo = "UPDATE Materiales SET saldo_actual = saldo_actual + $cantidad WHERE d_materialPrimaria = '$producto'";
} else {
    $consulta_saldo = "UPDATE Materiales SET saldo_actual = saldo_actual - $cantidad WHERE d_materialPrimaria = '$producto'";
}

$conexion->query($consulta_saldo);

echo "✅ Movimiento registrado con éxito.";
?>