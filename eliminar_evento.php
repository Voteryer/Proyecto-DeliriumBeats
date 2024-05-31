
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require __DIR__ . '/../src/db/db_connection.php';
        require __DIR__ . '/../src/controllers/EventoController.php';

        // $nombre = $_POST['nombre'];
        // $fecha_evento = $_POST['fecha_evento'];
        // $cartel_anunciador = null;

        $id_evento = $_POST['id'];
        $nombre = $_POST['nombre'];

        //echo $id_evento;
        $eventoController = new EventoController($pdo);
        $success = $eventoController->deleteEvento($id_evento);

        if ($success) {
            echo $success;
            echo "<script type='text/javascript'>
                alert('Fiesta {$nombre} eliminada con éxito');
                window.location.href='fiestas.php';
                </script>";


            //header("Location:fiestas.php");

        } else {
            echo "<p>Error al eliminar el evento: {$nombre}</p>";
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