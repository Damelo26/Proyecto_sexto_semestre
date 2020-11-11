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
                   if(empty($_REQUEST['id']) || empty($_REQUEST['usuario'])){
                     header('Location: Adoptado_Admin.php');
                   }
                   else{
                    $id_Mascota= $_REQUEST['id'];
                    $id_Usuario = $_REQUEST['usuario'];
                    $Query_Cantidad_Solicitudes = mysqli_query($conexion, "SELECT COUNT(*) as Total_Solicitudes from adoptados WHERE ID_Mascotas = '$id_Mascota'");
                    $Resultado_Cantidad_Solicitudes = mysqli_fetch_array($Query_Cantidad_Solicitudes);
                    $Total_Cantidad_Solicitudes = $Resultado_Cantidad_Solicitudes['Total_Solicitudes'];
                    if($Total_Cantidad_Solicitudes > 1){
                      $query_delete = mysqli_query($conexion, "DELETE FROM adoptados WHERE ID_Mascotas = '$id_Mascota' AND Cedula = '$id_Usuario'");
                      if($query_delete){
                        header('Location: Adoptado_Admin.php');
                        echo "Proceso exitoso, la mascota sigue en adopción";
                      }else{
                        header('Location: Adoptado_Admin.php');
                          echo "El proceso de rechazo de solicitud fallo";
                      }
                    }else{
                      $query_update = mysqli_query($conexion, "UPDATE mascotas INNER JOIN adoptados Ad 
                      ON Ad.ID_Mascotas = mascotas.ID_Mascota SET ID_Estado='1' WHERE Ad.ID_Mascotas = '$id_Mascota' AND Ad.Cedula = '$id_Usuario'");
                      if($query_update){
                        $query_delete = mysqli_query($conexion, "DELETE FROM adoptados WHERE ID_Mascotas = '$id_Mascota' AND Cedula = '$id_Usuario'");
                        if($query_delete){
                          header('Location: Adoptado_Admin.php');
                          echo "Proceso exitoso, la mascota sigue en adopción";
                        }else{
                          header('Location: Adoptado_Admin.php');
                          echo "El proceso de rechazo de solicitud fallo";
                        }
                      }else{
                        header('Location: Adoptado_Admin.php');
                        echo "El proceso de rechazo de solicitud fallo";
                      }
                      
                    }
                  }
                     
                     
                  ?>
                 
          