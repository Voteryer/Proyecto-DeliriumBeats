<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo registro</title>
    <?php include_once '../config/nocache.php'; ?>
    
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
    <h1 id="H" class="audiowide-regular ">DeliriumBeats</h1>
        
		<br>
		<!-- botones otra pagina -->
        <div class='menu'>
            <a href=" ../index.html"><button type="button" class="btn btn-primary">Inicio</button></a>

        </div>
		
		<div class="centrado">
		<p id=separador > ________________________________________________________________________________________________ </p>
		</div>
    <h1 id="H" class="audiowide-regular ">Registrate:</h1><br>

    <div class= "formulario_registro">
        <form action="nueva_persona.php" method="POST" enctype="multipart/form-data">
            <br><br><label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellido1">Primer apellido:</label><br>
            <input type="text" id="apellido1" name="apellido1" required><br><br>
    
            <label for="apellido2">Segundo apellido:</label><br>
            <input type="text" id="apellido2" name="apellido2" ><br><br>
        
            <label for="fecha_nacimiento">Fecha de nacimiento:</label><br>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>
        
            <label for="dni">DNI:</label><br>
            <input type="text" id="dni" name="dni" required><br><br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" required><br><br>

            <label for="passwd">Contraseña:</label><br>
            <input type="password" id="passwd" name="passwd" required><br><br>
        
            <input type="submit" value="Aceptar"><br><br>
        </form>
    </div>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require __DIR__ . '/../src/db/db_connection.php';
        require __DIR__ . '/../src/controllers/PersonaController.php';   
        var_dump($_POST);
        $nombre = $_POST['nombre'];
        $apellido1 =$_POST['apellido1'];
        $apellido2 =$_POST['apellido2'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $dni = $_POST['dni'];
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        //$cartel_anunciador = null;

       /* if (isset($_FILES['cartel_anunciador']) && $_FILES['cartel_anunciador']['error'] == 0) {
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
        }*/

        $personaController = new PersonaController($pdo);
        $success = $personaController->createPersona($dni, $nombre, $apellido1, $apellido2, $email, $passwd, $fecha_nacimiento);

        if ($success) {
            //echo "<p>Usuario creado exitosamente.</p>";
            echo'<script type="text/javascript">
                alert("Usuario registrado con éxito");
                window.location.href="fiestas.php";
                </script>';

            //header("Location:fiestas.php");

        } else {
            echo "<p>Error al registrar el usuario.</p>";
        }
    }
    ?>
    


</body>
</html>