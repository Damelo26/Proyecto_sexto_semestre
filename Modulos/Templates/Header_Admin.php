<?php
    session_start();
    if(!isset($_SESSION['ID_Rol'])){
        header('location: ../Login.php');
    }else{
        if($_SESSION['ID_Rol'] != 1){
            header('location: ../Principal.php');
        }
    }
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Pets Home</title>
    <link rel="stylesheet" href="CSS/EstiloAdmin.css">
    <link rel="stylesheet" href="CSS/EstiloLogin.css">
    <link rel="stylesheet" href="CSS/EstiloRegistrar_Admin.css">
    <script src = "https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="JavaScript/Admin.js" defer></script>
    <script src="JavaScript/Foto_Mascota.js" defer></script>
    <script>
        $(document).ready(function(){
            $(".menu_derecho li .fas").click(function(){
                $(".menu_perfil").toggleClass("active");
            });
            $(".Barra_Nav").click(function(){
                $(".Envoltura").toggleClass("active");
            })
        })
    </script>
</head>
<body>
	<div class = "Envoltura">
        <div class = "Top">
            <div class = "Barra_Nav">
                <div class="Contenido_Barra">
                    <div class="Linea_Uno"></div>
                    <div class="Linea_Dos"></div>
                    <div class="Linea_Tres"></div>
                </div>
            </div>
            <div class="menuadmin">
                <div class="logo">
                Pets Home
                </div>
                <div class="menu_derecho">
                    <ul>
                        <li><i class="fas fa-user-tie"></i>
                            <div class="menu_perfil">
                                <div class="item_menu_perfil"><a href="Modulos/Exit.php">Salir</a></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <div class = "Objeto_Contenedor">
                <div class="Barra_Deslizadora">
                    <div class="Barra_Deslizadora_Interna">
                        <div class="perfil">
                            <div class="imagen">
                                <img src = "<?php echo $_SESSION['Imagen']; ?>" alt = "profile_pic">
                            </div>
                            <div class="Info_Perfil">
                                <p>Bienvenido</p>
                                <p class = "Perfil_Nombre"><?php echo $_SESSION['Primer_Nombre'], ' ',$_SESSION['Primer_Apellido']; ?></p>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <a href="Estadistica_Admin.php" class="active">
                                    <span class="icon"><i class="fas fa-chart-bar"></i></span>
                                    <span class="titulo">Estadisticas</span>
                                </a>
                            </li>
                            <li>
                                <a href="Registrar_Admin.php">
                                    <span class="icon"><i class="fas fa-paw"></i></span>
                                    <span class="titulo">Registrar</span>
                                </a>
                            </li>
                            <li>
                                <a href="Administrar_Mascotas_Admin.php">
                                    <span class="icon"><i class="fas fa-feather-alt"></i></span>
                                    <span class="titulo">Administrar</span>
                                </a>
                            </li>
                            <li>
                                <a href="Adoptado_Admin.php">
                                    <span class="icon"><i class="fas fa-bone"></i></span>
                                    <span class="titulo">Adoptado</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
    
                