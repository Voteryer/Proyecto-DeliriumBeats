<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Evento</title>
</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require __DIR__ . '/../src/db/db_connection.php';
        require __DIR__ . '/../src/controllers/EventoController.php';

        $id_evento = $_POST['id'];
        $nombre = $_POST['nombre'];
        $eventoController = new EventoController($pdo);
        $success = $eventoController->getEvento($id_evento);
        

        SELECT * FROM FIESTAS WHERE id_evento = $id_evento;



}
else {
    echo "
    <h1>No tiene acceso a este documento</h1>
    ";
}
?>
    <h1>Modificar Evento</h1>
    <form action="nuevo_evento.php" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del Evento:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="nombre">Nombre del Evento:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="fecha_evento">Fecha del Evento:</label><br>
        <input type="date" id="fecha_evento" name="fecha_evento" required><br><br>
        
        <label for="cartel_anunciador">Cartel Anunciador:</label><br>
        <input type="file" id="cartel_anunciador" name="cartel_anunciador" accept="image/*"><br><br>
        
        <input type="submit" value="Crear Evento">
    </form>
<?php

    
        $fecha_evento = $_POST['fecha_evento'];
        $cartel_anunciador = $_POST['cartel'];

        if ($success) {
            echo $success;
            echo "<script type='text/javascript'>
                alert('Evento {$nombre} modificada con éxito');
                window.location.href='fiestas.php';
                </script>";


            //header("Location:fiestas.php");

        } else {
            echo "<p>Error al modificar el evento: {$nombre}</p>";
        }

        /*

        if (isset($_FILES['cartel_anunciador']) && $_FILES['cartel_anunciador']['error'] == 0) {
            //$upload_dir = __DIR__ . '/../assets/imgs/fiestas';
            $upload_dir = '/var/www/html/eventos/assets/imgs/fiestas/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $cartel_anunciador_filename = basename($_FILES['cartel_anunciador']['name']);
            $cartel_anunciador_path = $upload_dir . basename($_FILES['cartel_anunciador']['name']);
            move_uploaded_file($_FILES['cartel_anunciador']['tmp_name'], $cartel_anunciador_path);
            //echo "window.alert('{$cartel_anunciador_filename}');             ";
            //echo "<script>window.alert('{$upload_dir}');             </script>";
        }

        echo $cartel_anunciador_filename;
        $eventoController = new EventoController($pdo);
        $success = $eventoController->createEvento($nombre, $fecha_evento, $cartel_anunciador_filename);

        if ($success) {
            //echo "<p>Evento creado exitosamente.</p>";
            echo'<script type="text/javascript">
                alert("Fiesta creada con éxito");
                window.location.href="fiestas.php";
                </script>';

            //header("Location:fiestas.php");

        } else {
            echo "<p>Error al crear el evento.</p>";
        }
    }
    */
}
else {
    echo "
    <h1>No tiene acceso a este documento</h1>
    ";
}
    ?>