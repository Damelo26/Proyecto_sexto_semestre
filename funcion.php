<?php
    include "Configuraciones/Funciones.php";
    if(empty($_REQUEST['id']) || empty($_REQUEST['usuario'])){
        header('Location: Adoptado_Admin.php');
    }else{
        $id_Mascota = $_REQUEST['id'];
        $id_Usuario = $_REQUEST['usuario'];
        $query_update = mysqli_query($conexion, "UPDATE mascotas INNER JOIN adoptados Ad ON Ad.ID_Mascotas = mascotas.ID_Mascota SET mascotas.ID_Estado = '2' WHERE Ad.ID_Mascotas = '$id_Mascota' AND Ad.Cedula = '$id_Usuario'");
        echo "Prueba";
        if($query_update){
            header('Location: Adoptado_Admin.php');
            echo "Proceso exitoso, mascota aprobada";
        }else{
            header('Location: Adoptado_Admin.php');
            echo "Fallo el proceso de aprobación de solicitud";
        }
    }
?>