<?php include_once 'Modulos/Templates/header.php';  ?>
<?php 
    $sql = "SELECT * FROM mascotas WHERE Foto != '' ";
    $sql2 = "SELECT * FROM mascotas as m WHERE m.ID_Estado = 1";
    $contar= "SELECT COUNT(*) as total_registros FROM mascotas as m WHERE m.ID_Estado = 1
                      ORDER BY m.ID_Mascota ASC"; 
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="adopta.js"></script>
    <div class="seccion_mascotas_busqueda">
        <?php 
        require_once "Configuraciones/Funciones.php";
        $consulta_general = mysqli_query($conexion, "SELECT * FROM mascotas as m 
                                                                WHERE m.ID_Estado = 1
                                                                ORDER BY m.ID_Mascota ASC");
        $Cant_Resultados = mysqli_num_rows($consulta_general); 
        $por_pagina = 15;
        if(empty($_GET['pagina'])){
            $pagina = 1;
        }else{
             $pagina = $_GET['pagina'];
             }
        $desde = ($pagina-1) * $por_pagina;
        $total_Paginas = ceil($Cant_Resultados / $por_pagina);                            
        $consulta_general = mysqli_query($conexion, "SELECT m.ID_Mascota, m.Nombre_Mascota, m.Foto, m.Frase 
                                                                FROM mascotas as m 
                                                                WHERE (m.ID_Estado = 1 OR m.ID_Estado = 3)
                                                                ORDER BY m.ID_Mascota 
                                                                ASC LIMIT $desde,$por_pagina");
        ?>
        <h2 class="Titulo_mascotas"> Las mascotas son:</h2>
        <br> <!--Quitar poner margin-->
        <p class="Texto_caracteristicas">Puedes buscar las mascotas por la caracteristica que mas te llame la atención.</p>

        <?php 
            $Consulta_Tamaño = mysqli_query($conexion, "SELECT t.Nombre as Nombre 
                                                                FROM tamano as t 
                                                                ORDER BY t.Nombre ASC ");
            $consulta_Categorias = mysqli_query($conexion, "SELECT cat.Nombre as Nombre
                                                                    FROM categoria_mascota as cat 
                                                                    ORDER BY cat.Nombre ASC ");
            $consulta_Color =  mysqli_query($conexion, "SELECT  col.Nombre as Nombre
                                                                FROM color as col 
                                                                ORDER BY col.Nombre ASC ");
            $consulta_Sexo = mysqli_query($conexion, "SELECT  s.Sexo as Nombre
                                                                FROM sexo as s 
                                                                ORDER BY s.Sexo ASC ");                                                    
        ?>
        <div class= "Agrupar_Form">
            <div class="Agrupar_Select">
                <div class="content-select">
                    <select name="xmascota" id="xmascota" class="select_buscar">
                        <option value="" class ="select_opciones">¿Cual mascota buscas?</option>
                        <?php 
                        $Cantidad_Categorias = mysqli_num_rows($consulta_Categorias);
                        if($Cantidad_Categorias > 0){
                            while($resulset = mysqli_fetch_array($consulta_Categorias)){?>
                                <option value="<?php echo $resulset["Nombre"]; ?>"><?php echo $resulset["Nombre"] ?></option>
                            <?php
                            }
                        }
                        ?>
                        
                    </select>
                    <i></i>
                </div>
                <div class="content-select" id="raza_mas">
                    <select name="xraza" id="xraza" class="select_buscar">
                    <option value="" class ="select_opciones">¿Que raza buscas?</option>
                    </select>
                    <i></i>
                </div>
                <div class="content-select">
                    <select name="xtamaño" id="xtamaño" class="select_buscar">
                        <option value="" class ="select_opciones">¿Que tamaño buscas?</option>
                        <?php 
                        $Cantidad_Tamaño = mysqli_num_rows($Consulta_Tamaño);
                        if($Cantidad_Tamaño > 0){
                            while($resulset = mysqli_fetch_array($Consulta_Tamaño)){?>
                                <option value="<?php echo $resulset["Nombre"]; ?>"><?php echo $resulset["Nombre"] ?></option>
                            <?php
                            }
                        }
                        ?>                   
                    </select>
                    <i></i>
                </div>
                <div class="content-select ">
                    <select name="xcolor" id="xcolor" class="select_buscar">
                    <option value="" class ="select_opciones">¿Que Color te gusta?</option>
                    <?php 
                        $Cantidad_color = mysqli_num_rows($consulta_Color);
                        if($Cantidad_Tamaño > 0){
                            while($resulset = mysqli_fetch_array($consulta_Color)){?>
                                <option value="<?php echo $resulset["Nombre"]; ?>"><?php echo $resulset["Nombre"] ?></option>
                            <?php
                            }
                        }
                        ?>  
                    </select>
                    <i></i>
                </div>
                <div class="content-select ">
                    <select name="xsexo" id="xsexo" class="select_buscar">
                    <option value="" class ="select_opciones">¿Que sexo te gusta?</option>
                    <?php 
                        $Cantidad_sexo = mysqli_num_rows($consulta_Sexo);
                        if($Cantidad_sexo > 0){
                            while($resulset = mysqli_fetch_array($consulta_Sexo)){?>
                                <option value="<?php echo $resulset["Nombre"]; ?>"><?php echo $resulset["Nombre"] ?></option>
                            <?php
                            }
                        }
                        ?>  
                    </select>
                    <i></i>
                </div>
            </div>    
            <form action="Search_mas.php" method="GET" class="form_buscar_mascota">            
                <input type="text" name="search_mas" placeholder="Buscar" class ="input_buscar">
                <div class="button-border">
                     <button class="button Btn_Buscador">Buscar</button>
                </div>
            </form>
        </div>
        <div class="resultado"></div>
            <div class="ordenar">
                <ul class="lista_mascotas">
                    <?php
                        while($mascotas = mysqli_fetch_array($consulta_general)){?>
                            <li>
                                <div class="mascota">
                                    <a href="Adopta_Esp.php?mascota=<?php echo $mascotas['ID_Mascota']?>" class="cinta uno" <?php echo $mascotas['ID_Mascota']?>>
                                    <img class ="img_mascotas" src= "<?php echo $mascotas['Foto'] ?>" alt="Imagen perro uno"/>
                                    </a> 
                                    <p class="Nombre_Mascota"><?php echo $mascotas['Nombre_Mascota']?></p>
                                    <p class="Frase_Oculta"><?php echo $mascotas['Frase']?></p>      
                                </div>
                            </li>
                        <?php } /**while de fetch*/ ?>
                    <?php $conexion->close(); ?>  
                </ul>
            </div>
        </div>
        <div class="paginador-Adopta">
            <ul>
                <?php if($pagina !=1 ){?>
                    <li><a href="?pagina=<?php echo 1; ?>" >|<</a></li>
                    <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
                <?php 
                }
                for ($i=1; $i <= $total_Paginas; $i++) { 
                    if($i == $pagina){
                        echo '<li class="pagesSeletedAdopta">'.$i.'</li>'; 
                        }else{
                            echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>'; 
                            }
                        }
                        if($pagina != $total_Paginas){?> 
                            <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                            <li><a href="?pagina=<?php echo $total_Paginas; ?>">>|</a></li>
                        <?php }?>
            </ul>    
        </div>
    <div id="resultadoBusqueda"><!-- No se si esto tenga funcionalidad --> </div>              
<!--<section id="tabla_resultado">AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA </section>-->
<?php include_once 'Modulos/Templates/footer.php';  ?>