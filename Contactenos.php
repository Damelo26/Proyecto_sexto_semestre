<?php include_once 'Modulos/Templates/header.php';  ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/EstiloContacto.css">
    <title>Contactenos</title>
</head>
<body>
    <section id="container">	
    <center>
     <h1>¿Tienes preguntas? Contáctanos!</h1>
        <form method="post" action="enviar.php">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="email" name="email" placeholder="Correo"required >
        <textarea type="text" name="mensaje" placeholder="¿Mensaje,Duda, Sugerencia?: Escribela aquí" required>
        </textarea>
        <input type="submit" value="ENVIAR" id="boton">
        </form>
    </center>
    </section>
</body>
</html>

<?php include_once 'Modulos/Templates/footer.php';  ?>