<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $ph = $_POST["ph"];
    $tempMin = $_POST["temp_min"];
    $tempMax = $_POST["temp_max"];

    // Conectar a la base de datos (ajusta los detalles de conexión)
    $conexion = pg_connect("host=tu_servidor dbname=tu_basededatos user=tu_usuario password=tu_contraseña");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . pg_last_error());
    }

    // Construir y ejecutar la consulta SQL
    $consulta = "INSERT INTO otra_tabla (ph, temp_min, temp_max) VALUES ('$ph', '$tempMin', '$tempMax')";

    $resultado = pg_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        echo "Datos guardados correctamente.";
    } else {
        echo "Error al guardar los datos: " . pg_last_error();
    }

    // Cerrar la conexión a la base de datos
    pg_close($conexion);
}
?>

