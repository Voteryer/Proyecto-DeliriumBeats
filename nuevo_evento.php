<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Evento</title>
    <!-- añadir la tipografia -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
    
    <!-- bootstrap -->
    <link 
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous"
    >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script 
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"
    ></script>
    <link rel="STYLESHEET" type="text/css" href="../assets/css/estilos.css">
</head>
<body>

<br><br><h1 id="H" class="audiowide-regular ">Crear evento</h1><br>
<div class="centrado">
    <p id=separador > ________________________________________________________________________________________________ </p>
</div>
    <div class="formulario_evento_nuevo">
        <form action="nuevo_evento.php" method="POST" enctype="multipart/form-data">
            <br><label for="nombre">Nombre del Evento:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>
            
            <label for="fecha_evento">Fecha del Evento:</label><br>
            <input type="date" id="fecha_evento" name="fecha_evento" required><br><br>
            
            <label for="cartel_anunciador">Cartel Anunciador:</label><br>
            <input type="file" id="cartel_anunciador" name="cartel_anunciador" accept="image/*"><br><br>
            
            <input type="submit" value="Crear Evento"><br><br>
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require __DIR__ . '/../src/db/db_connection.php';
        require __DIR__ . '/../src/controllers/EventoController.php';

        $nombre = $_POST['nombre'];
        $fecha_evento = $_POST['fecha_evento'];
        $cartel_anunciador = null;

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
    ?>

<br><br><a href=" fiestas.php"><button type="button" class="btn btn-primary">Volver</button></a><br><br>
</body>
</html>
