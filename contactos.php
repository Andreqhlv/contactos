<?php
// Permitir acceso desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Conexión a PostgreSQL con los datos de Railway
$host = 'hopper.proxy.rlwy.net';
$port = '18364';
$dbname = 'railway';
$user = 'postgres';
$password = 'MKlcaeTXlrcHziINORyaZviRvkRPoCkn';

$conexion = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conexion) {
    echo json_encode(["error" => "❌ Error de conexión a la base de datos"]);
    exit;
}

// Ejecutar consulta
$query = "SELECT id, nombre, telefono FROM contactos";
$resultado = pg_query($conexion, $query);

// Verificar errores
if (!$resultado) {
    echo json_encode(["error" => "❌ Error al ejecutar la consulta"]);
    exit;
}

// Construir respuesta
$contactos = [];
while ($fila = pg_fetch_assoc($resultado)) {
    $contactos[] = $fila;
}

// Devolver JSON
echo json_encode($contactos);
?>
