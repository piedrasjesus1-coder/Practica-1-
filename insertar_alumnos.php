<?php
// Configuración de la base de datos
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "escuela";

// Crear conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Crear la tabla si no existe
$sql_tabla = "CREATE TABLE IF NOT EXISTS alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    genero VARCHAR(20) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(150) NOT NULL,
    correo VARCHAR(100) NOT NULL
)";
$conexion->query($sql_tabla);

// Arreglo con 5 registros de alumnos
$alumnos = [
    [
        "nombre" => "Carlos Gómez",
        "genero" => "Masculino",
        "telefono" => "5551234567",
        "direccion" => "Av. Insurgentes Sur 123",
        "correo" => "carlos.gomez@email.com"
    ],
    [
        "nombre" => "María Hernández",
        "genero" => "Femenino",
        "telefono" => "5559876543",
        "direccion" => "Calle Juárez 45",
        "correo" => "maria.hernandez@email.com"
    ],
    [
        "nombre" => "Luis Martínez",
        "genero" => "Masculino",
        "telefono" => "5554567890",
        "direccion" => "Av. Hidalgo 88",
        "correo" => "luis.martinez@email.com"
    ],
    [
        "nombre" => "Ana Rodríguez",
        "genero" => "Femenino",
        "telefono" => "5553216549",
        "direccion" => "Calle Morelos 12",
        "correo" => "ana.rodriguez@email.com"
    ],
    [
        "nombre" => "Sofía López",
        "genero" => "Femenino",
        "telefono" => "5557891234",
        "direccion" => "Av. Reforma 404",
        "correo" => "sofia.lopez@email.com"
    ]
];

// Insertar los 5 registros usando Sentencias Preparadas (Prepared Statements)
$stmt = $conexion->prepare("INSERT INTO alumnos (nombre, genero, telefono, direccion, correo) VALUES (?, ?, ?, ?, ?)");

foreach ($alumnos as $alumno) {
    $stmt->bind_param("sssss", $alumno['nombre'], $alumno['genero'], $alumno['telefono'], $alumno['direccion'], $alumno['correo']);
    $stmt->execute();
}

echo "Se han insertado los 5 registros de alumnos correctamente.";

// Cerrar preparación y conexión
$stmt->close();
$conexion->close();
?>
