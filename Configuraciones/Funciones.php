<?php

	//@session_start();
	//@extract($_REQUEST);

	$host_mysql = "localhost";
	$user_mysql = "root";
	$pass_mysql = "";
	$db_mysql = "pets home";

	$conexion=new mysqli($host_mysql,$user_mysql,$pass_mysql,$db_mysql);
	if($conexion->connect_errno){
		
	}else{
		
	}
?>