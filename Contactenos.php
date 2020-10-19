<?php include_once 'Modulos/Templates/header.php';  ?>


    
   
    <section id="containercontacto">	
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


<?php include_once 'Modulos/Templates/footer.php';  ?>