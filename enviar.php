<?php include_once 'Modulos/Templates/header.php';  ?>

<?php 
    $myemail = 'petshome29@gmail.com';
    $name = $_POST['nombre'];
    $email = $_POST['email'];
    $message = $_POST['mensaje'];

    $to = $myemail;

    $email_body = "Haz recibido un nuevo mensaje. \n Nombre:". $name ."\n Correo: " . $email ."\n Mensaje: \n" . $message;
    $headers = "From: $email";

        mail($to,"Contacto", $email_body, $headers);
        header("Location:Gracias.php");
 ?>

<?php include_once 'Modulos/Templates/footer.php';  ?>