<?php
   
        include "Configuraciones/Funciones.php";
              /*        $CCpersona = "657";
                      $idmasc = "1";
                      $estadom = "Si";
                      $query_insert = mysqli_query($conexion, "INSERT INTO adoptados(cedula,	ID_Mascotas,	Aprobado) 
                      VALUES('$CCpersona','$idmasc','$estadom')");
                      if($query_insert){
                        
                        header("Location:Mascota_Aprobada.php");
                      }else{
                        echo "No se pudo registrar";
                      }*/ /* PUSE ESTO EN COMENTARIO PORQUE AQUI LO QUE HARIA ES METER LO QUE SE RECIBA EN BASE A LO DE OXH*/
                   if(empty($_REQUEST['id'])){
                     header('Location: Adoptado_Admin.php');
                   }
                   else{
                    $dato= $_REQUEST['id'];
                    $query_insert = mysqli_query($conexion, "UPDATE mascotas SET ID_Estado='2' WHERE ID_Mascota='$dato'");
                    header('Location: Adoptado_Admin.php');
                    echo "Proceso exitoso, mascota aprobada";
                  }
                     
                     
                  ?>
                 