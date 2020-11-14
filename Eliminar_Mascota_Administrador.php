<?php
include "Configuraciones/Funciones.php";
    if(empty($_REQUEST['id'])){
        header('Location: Administrar_Mascotas_Admin.php');
    }else{
    $ID_Eliminar = $_REQUEST['id'];
    //$Query_Eliminar= mysqli_query($conexion, "SELECT m.ID_Mascota, m.ID_Categoria, C.Nombre as Categoria, m.Nombre_Mascota as Nombre, m.Raza, m.Edad, m.Descripcion, m.Foto, m.ID_Color, Cl.Nombre as Color, m.ID_Tamano, T.Nombre as Tamano, m.Frase, m.Peso,m.ID_Estado, Es.Estado as Estado FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado WHERE m.ID_Mascota = $ID_Eliminar");
    $Query_Eliminar= mysqli_query($conexion, "SELECT m.ID_Mascota, C.Nombre as Categoria, m.Nombre_Mascota as Nombre, R.Raza, m.Edad, Cl.Nombre as Color, T.Nombre as Tamano, m.Frase, m.Peso, m.Foto, Es.Estado as Estado FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado INNER JOIN raza R ON R.ID_Raza = m.ID_Raza WHERE m.ID_Mascota = $ID_Eliminar");
    $Resultado_Eliminar = mysqli_num_rows($Query_Eliminar);
      if($Resultado_Eliminar > 0){
          while($Datos_Eliminar = mysqli_fetch_array($Query_Eliminar)){
            $ID_Eliminar_Mascota = $Datos_Eliminar['ID_Mascota'];
            $Categoria_Eliminar = $Datos_Eliminar['Categoria'];
            $Nombre_Eliminar = $Datos_Eliminar['Nombre'];
            $Raza_Eliminar = $Datos_Eliminar['Raza'];
            $Edad_Eliminar = $Datos_Eliminar['Edad'];
            $Color_Eliminar = $Datos_Eliminar['Color'];
            $Tamano_Eliminar = $Datos_Eliminar['Tamano'];
            $Frase_Eliminar = $Datos_Eliminar['Frase'];
            $Peso_Eliminar = $Datos_Eliminar['Peso'];
            $Foto_Eliminar = $Datos_Eliminar['Foto'];
            $Estado_Eliminar = $Datos_Eliminar['Estado'];
          }
      }else{
        header('Location: Administrar_Mascotas_Admin.php');
      }
    }
    if(!empty($_POST)){
        $ID_Mascota = $_POST['ID_Mascota'];
        $query_delete = mysqli_query($conexion, "DELETE FROM mascotas WHERE ID_Mascota = $ID_Mascota");
        if($query_delete){
            header('Location: Administrar_Mascotas_Admin.php');
        }else{
            echo "Error al eliminar la mascota";
        }
    }
?>
<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
    <div class="Contenido">
        <section id="Contenedor_Eliminar_Mascota">
            <div class="Datos_Eliminar_Administrador">
                <h2>¿Seguro quiere eliminar esta mascota?</h2>
                <p>Categoria: <span><?php echo $Categoria_Eliminar; ?></span></p>
                <p>Nombre: <span><?php echo $Nombre_Eliminar; ?></span></p>
                <p>Raza: <span><?php echo $Raza_Eliminar; ?></span></p>
                <p>Edad: <span><?php echo $Edad_Eliminar; ?></span></p>
                <p>Color: <span><?php echo $Color_Eliminar; ?></span></p>
                <p>Tamaño: <span><?php echo $Tamano_Eliminar; ?></span></p>
                <p>Frase: <span><?php echo $Frase_Eliminar; ?></span></p>
                <p>Peso: <span><?php echo $Peso_Eliminar; ?></span></p>
                <p>Estado: <span><?php echo $Estado_Eliminar; ?></span></p>
                <img src="<?php echo $Foto_Eliminar; ?>" alt="" class="Ver_Foto_Mascota_Tamano" id="imagenPrevisualizacion">
                <form  action="" method="post">
                    <input type="hidden" name="ID_Mascota" value="<?php echo $ID_Eliminar_Mascota; ?>">
                    <a href="Administrar_Mascotas_Admin.php" class="Btn_Cancelar_Eliminar_Mascota">Cancelar</a>
                    <input type="submit" value="Aceptar" class="Btn_Aceptar_Eliminar_Mascota">
                </form>
            </div>
        </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>