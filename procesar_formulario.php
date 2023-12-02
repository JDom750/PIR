<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $producto = $_POST["Productos"];
    $fechaElaboracion = $_POST["Fecha_elaboracion"];
    $responsable = $_POST["Responsable"];

    // Conectar a la base de datos (asegúrate de tener los detalles de conexión correctos)
    $conexion = pg_connect("host=localhost dbname=planta user=postgres password=postgres");

    // Verificar la conexión
    if (!$conexion) {
        die("Error al conectar a la base de datos: " . pg_last_error());
    }

    // Construir y ejecutar la consulta SQL
    $consulta = "INSERT INTO control_calidad (fecha_elaboracion, producto, responsable) VALUES ('$fechaElaboracion', '$producto', '$responsable')";

    $resultado = pg_query($conexion, $consulta);

    // Verificar si la consulta fue exitosa
    if ($resultado) {
        // Redirigir al siguiente formulario (xxx.html)
        header("Location: xxx.html");
    } else {
        echo "Error al ingresar los datos: " . pg_last_error();
    }

    // Cerrar la conexión a la base de datos
    pg_close($conexion);
}
?>

