<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
<main>
        <a name="volver"> </a>
        <h1 id="H" class="audiowide-regular ">DeliriumBeats</h1>
        
		<br>
		<!-- botones otra pagina -->
        <div class='menu'>
            <a href=" ../index.html"><button type="button" class="btn btn-primary">Inicio</button></a>
            <a href=" fiestas.php"><button type="button" class="btn btn-primary">Fiestas</button></a>
            <a href=" nueva_persona.php"><button type="button" class="btn btn-primary">Registro</button></a>
        </div>
		
		<div class="centrado">
		<p id=separador > ________________________________________________________________________________________________ </p>
		</div>
		<div class="centrado">
		<img src="../assets/imgs/logo2.jpg"> <!-- para insertar imagenes -->
		</div><br>
		<h1 id="H" class="audiowide-regular ">Eventos</h1><br>
		
<?php
//read_eventos.php  

require __DIR__ . '/../src/db/db_connection.php';
require __DIR__ . '/../src/controllers/EventoController.php';


$icono_papelera = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
<path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
</svg>";

$icono_lapiz = "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'>
<path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z'/>
</svg>";

$eventoController = new EventoController($pdo);
$eventos = $eventoController->getAllEventos();

echo "<table border='1' class='listado_fiestas'>
<tr>
<th>ID Evento</th>
<th>Nombre</th>
<th>Fecha del Evento</th>
<th>Cartel Anunciador</th>
</tr>";

foreach ($eventos as $evento) {
    echo "<tr>
    <td>{$evento['id_evento']}</td>
    <td>{$evento['nombre']}</td>
    <td>{$evento['fecha_evento']}</td>
    <td>";
    if ($evento['cartel_anunciador']) {
        echo "<img src='../assets/imgs/fiestas/{$evento['cartel_anunciador']}' alt='Cartel' width='300' />";
    }
    echo "</td>
    <td>
        <form action='eliminar_evento.php' method='post'>
            <input type='hidden' id='{$evento['id_evento']}_mod' name='id' value='{$evento['id_evento']}'>
            <input type='hidden' id='{$evento['nombre']}_nombre' name='nombre' value='{$evento['nombre']}'>
            <button type='submit' class='btn btn-danger'>
                <i class='fas fa-trash-alt'></i>
            </button>
        </form>
        <form action='modificar_evento.php' method='post'>
            <input type='hidden' id='{$evento['id_evento']}_mod' name='{$evento['id_evento']}_mod' value='{$evento['id_evento']}'>
            <button type='submit' class='btn btn-primary'>
                <i class='fas fa-pencil-alt'></i>
            </button>
        </form>
    </td>
    
    </tr>";
}
echo "</table>";
?>


<br><a href="nuevo_evento.php"><button type="button" class="btn btn-primary">Crear evento</button></a><br><br>
<a href="#volver"><button type="button" class="btn btn-primary">Volver arriba</button></a><br><br>

    

</main>
</body>
</html>