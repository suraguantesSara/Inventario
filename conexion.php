<?php
$conexion = new mysqli("sql109.infinityfree.com", "if0_38651999", "TU_CONTRASEÑA", "if0_38651999_inventario_db");

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

echo "✅ Conexión exitosa";
?>
