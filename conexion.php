<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "sql109.infinityfree.com";
$usuario = "if0_38651999";
$contraseña = "suraguantes2025";  // Asegúrate de que esta sea la actual
$base_datos = "if0_38651999_XXX";

$conexion = new mysqli($servidor, $usuario, $contraseña, $base_datos);

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
} else {
    echo "✅ Conexión exitosa a la base de datos.";
}
?>
