
<?php 
    require_once "Configuraciones/Funciones.php";
    $mensaje_tamaño = "";
    $mensaje = "";
    /*Evalua si la funcion viene vacia, esta*/
    if (isset($_POST['alumnos'])) {
        $consultaBusqueda = strtolower($_REQUEST['alumnos']);
        $consulta_cantidad = mysqli_query($conexion, "SELECT * FROM mascotas WHERE Nombre_Mascota LIKE '%$consultaBusqueda%'"); 
        $filas = mysqli_num_rows($consulta_cantidad);
        if ($filas > 0) {
            $por_pagina = 15;
            if(empty($_GET['pagina'])){
                $pagina = 1;
            }else{
                $pagina = $_GET['pagina'];
            }
            echo $pagina;
            $desde = ($pagina-1) * $por_pagina;
            $total_Paginas = ceil($filas / $por_pagina); 
            $consulta_mas = mysqli_query($conexion, "SELECT * FROM mascotas AS m WHERE Nombre_Mascota LIKE '%$consultaBusqueda%'ORDER BY m.ID_Mascota ASC LIMIT $desde,$por_pagina"); 
            //Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje.=
            '<div class="ordenar">
            <ul class="lista_mascotas">';     
                while($mascotas = mysqli_fetch_array($consulta_mas)){
                    $mensaje.=       
                    '<li>
                                <div class="mascota">
                                    <a href="Adopta_Esp.php?mascota='.$mascotas['ID_Mascota'].'"class="cinta uno" '.$mascotas['ID_Mascota'].'>
                                        <img class ="img_mascotas" src= "'.$mascotas['Foto'].'" alt="Imagen perro uno"/>
                                    </a> 
                                        <p class="Nombre_Mascota">'.$mascotas['Nombre_Mascota'].'</p>
                                        <p class="Frase_Oculta">'.$mascotas['Frase'].'</p>      
                                </div>
                            </li>
                            ';
                    } /**while de fetch*/ 
            $mensaje.= '</ul> 
            </div>'; /*Ordenar*/
            $mensaje.= 
            '<div class="paginador-Adopta">
                <ul>
                ';
                 if($pagina !=1 ){
                    $mensaje.='<li><a href="?pagina=1&Buscador='.$consultaBusqueda.'">|<</a></li>
                    <li><a href="?pagina='.($pagina-1).'"><<</a></li>';
                    }
                        for ($i=1; $i <= $total_Paginas; $i++) { 
                            if($i == $pagina){
                                $mensaje.='<li class="pagesSeletedAdopta">'.$i.'</li>'; 
                            }else{
                                $mensaje.='<li><a href="?pagina='.$i.'&Buscador='.$consultaBusqueda.'">'.$i.'</a></li>'; 
                            }
                        }
                        if($pagina != $total_Paginas){ 
                        $mensaje.= '<li><a href="?pagina='.($pagina + 1).'&Buscador='.$consultaBusqueda.'">>></a></li>
                    <li><a href="?pagina='.$total_Paginas.'&Buscador='.$consultaBusqueda.'">>|</a></li>';
                         }
               $mensaje.= ' </ul>    
            </div>';
            }; //Fin else $filas
        }else{
            $mensaje="No se encontraron coincidencias con sus criterios de búsqueda.";

        }
            //Devolvemos el mensaje que tomará jQuery
     echo $mensaje;
     /** TAMAÑO **/
        if (isset($_POST['xtamaño'])) {
                echo $_POST['xtamaño'];
                $consulta_tamaño = $_POST['xtamaño'];
                $consulta_cantidad = mysqli_query($conexion, "SELECT m.Nombre_Mascota as Nombre, m.Edad as Edad, t.Nombre as Tamaño FROM mascotas as m INNER JOIN tamano as t on t.ID_Tamano = m.ID_Tamano WHERE m.ID_Tamano = '$consulta_tamaño'"); 
                $filas = mysqli_num_rows($consulta_cantidad);     
        if ($filas > 0) {
            $consulta_mas = mysqli_query($conexion, "SELECT m.Nombre_Mascota as Nombre, m.Edad as Edad, t.Nombre as Tamaño FROM mascotas as m INNER JOIN tamano as t on t.ID_Tamano = m.ID_Tamano WHERE m.ID_Tamano = '$consulta_tamaño'"); 
            //Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            $mensaje_tamaño.=
            '<table>
                <tr>
                    <td>Nombre</td>
                    <td>Edad</td>
                    <td>Tamaño</td>
                </tr>';
            while($resultados = mysqli_fetch_array($consulta_cantidad)) {
                $mensaje_tamaño.=
                '<tr>
                    <td>'.$resultados['Nombre'].'</td>
                    <td>'.$resultados['Edad'].'</td>
                    <td>'.$resultados['Tamaño'].'</td>
                </tr>
                ';
            }
            $mensaje_tamaño.='</table>';
            }; //Fin else $filas
        }else{
            $mensaje_tamaño="No se encontraron coincidencias con sus criterios de búsqueda.";
        } //Devolvemos el mensaje que tomará jQuery
        /*****/
        echo $mensaje_tamaño;
        $xraza = $_POST['xmascota'];
        $consulta_cantidad = mysqli_query($conexion, "SELECT r.Raza as Raza FROM raza r INNER JOIN categoria_mascota as cat on cat.ID_Categoria = r.ID_Categoria WHERE cat.Nombre = '$xraza'"); 
        $cadena.= '<option value="" class ="select_opciones">¿Que raza buscas?</option>';
        while($razas = mysqli_fetch_array($consulta_cantidad)) {
            $cadena.='<option value="'.$razas['Raza'].'">'.$razas['Raza'].'</option>';
        }
        echo $cadena;
?>  