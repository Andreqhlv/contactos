<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Encabezados HTTP
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Datos de conexión extraídos de tu URL de Railway
$host = 'interchange.proxy.rlwy.net';
$port = 30523;
$user = 'root';
$password = 'YwqVQxLQTvgyFSVGWWaJNEnEQCKfMUjv';
$database = 'railway';

// Conectar a MySQL
$conexion = new mysqli($host, $user, $password, $database, $port);

// Verificar conexión
if ($conexion->connect_error) {
    echo json_encode(["error" => "❌ Error de conexión: " . $conexion->connect_error]);
    exit;
}

// Ejecutar consulta
$sql = "SELECT id, nombre, telefono FROM contactos";
$resultado = $conexion->query($sql);

// Verificar errores
if (!$resultado) {
    echo json_encode(["error" => "❌ Error en la consulta: " . $conexion->error]);
    exit;
}

// Formar respuesta
$contactos = [];
while ($fila = $resultado->fetch_assoc()) {
    $contactos[] = $fila;
}

// Devolver JSON
echo json_encode($contactos);
?>
