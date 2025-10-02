<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Datos de conexión desde Railway
$host = 'hopper.proxy.rlwy.net';
$port = '18364';
$dbname = 'railway';
$user = 'postgres';
$password = 'MKlcaeTXlrcHziINORyaZviRvkRPoCkn';

// Conexión a PostgreSQL
$connStr = "host=$host port=$port dbname=$dbname user=$user password=$password";
$conexion = pg_connect($connStr);

// Verifica conexión
if (!$conexion) {
    echo json_encode(["error" => "❌ Error de conexión a la base de datos"]);
    exit;
}

// Ejecuta consulta
$resultado = pg_query($conexion, "SELECT id, nombre, telefono FROM contactos");

if (!$resultado) {
    echo json_encode(["error" => "❌ Error al ejecutar la consulta"]);
    exit;
}

// Formatear respuesta
$contactos = [];
while ($fila = pg_fetch_assoc($resultado)) {
    $contactos[] = $fila;
}

echo json_encode($contactos);
?>
