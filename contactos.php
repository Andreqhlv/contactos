<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// DATOS DE CONEXIÓN - AJUSTA según tu base
$host = 'interchange.proxy.rlwy.net';
$port = 30523;
$user = 'root';
$password = 'YwqVQxLQTvgyFSVGWWaJNEnEQCKfMUjv';
$database = 'railway';

// Conexión a MySQL
$conexion = new mysqli($host, $user, $password, $database, $port);

if ($conexion->connect_error) {
    echo json_encode(["error" => "❌ Error de conexión: " . $conexion->connect_error]);
    exit;
}

$resultado = $conexion->query("SELECT id, nombre, telefono FROM contactos");

$contactos = [];
while ($fila = $resultado->fetch_assoc()) {
    $contactos[] = $fila;
}

echo json_encode($contactos);
?>
