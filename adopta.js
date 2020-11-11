
$(document).ready(function() {
	//MASCOTAS
	/*obtener_registros();*/
	//FILTRO DE CATEGRORIA MASCOTA
	$('#xmascota').change(function(){
		var valorBusqueda= $('select[id=xmascota]').val(); /*Obtengo la evaluacion del dato*/ 
		//cambiar_tamaño(valorBusqueda); /*Paso el el dato obtenido*/
		Recargar_Lista();
		
	});
	//FILTRO DE RAZA
	$('#xraza').change(function(){
		var valorBusqueda= $('select[id=xraza]').val(); /*Obtengo la evaluacion del dato*/ 
		//cambiar_tamaño(valorBusqueda); /*Paso el el dato obtenido*/
		var table = 'raza';
		
		cambiar_tamaño(valorBusqueda, table);
	});
	//FILTRO DE TAMAÑO
	$("#xtamaño").change(function(){
		var valorBusqueda= $('select[id=xtamaño]').val(); /*Obtengo la evaluacion del dato*/ 
		var table = 'tamaño';
		cambiar_tamaño(valorBusqueda, table); /*Paso el el dato obtenido*/
		
	});
	//FILTRO DE COLOR
	$("#xcolor").change(function(){
		var valorBusqueda= $('select[id=xcolor]').val(); /*Obtengo la evaluacion del dato*/ 
		var table = 'color';
		cambiar_tamaño(valorBusqueda, table); /*Paso el el dato obtenido*/
	});
	//FILTRO DE SEXO
	$("#xsexo").change(function(){
		var valorBusqueda= $('select[id=xsexo]').val(); /*Obtengo la evaluacion del dato*/
		var table = 'sexo'; 
		cambiar_tamaño(valorBusqueda, table); /*Paso el el dato obtenido*/
	});
});
function obtener_registros(alumnos)
{
	$.ajax({
		url : 'Adopta.php',
		type : 'POST',
		data : {alumnos: alumnos},	
		})
	.done(function(resultado){
		var valor_caja_texto = $('#busqueda_mascotas').val();
		$("#tabla_resultado").html(resultado);//Imprime
		/*
		$("#busqueda_mascotas").html(valor_caja_texto);*/
		/*window.location.replace("adoptados.php");*/

	})
}

$(document).on('keyup', '#ss', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
		/*window.location.replace("adoptados.php");*/
		/*var valor_caja_texto = $('#busqueda_mascotas').val();*/
		/*location.href= "adopta.php?Buscador="+valor_caja_texto;*/
	}
	else{
		/*$("#tabla_resultado").html(''); //Para que no pete*/
		//$("#resultadoBusqueda").html('<p>JQUERY VACIO 2</p>');
		}
});

function cambiar_tamaño(xvalor,xtabla){
	$.ajax({
		url : 'Search_mas.php',
		type : 'GET',
		data : { xvalor: xvalor, xtabla : xtabla },
		})
	.done(function(resultado){
		//$("#tabla_resultado").html(resultado);
		//window.location.replace("Search_mas.php");
		
		window.location.replace("Search_cat.php?search_mas="+xvalor+"&table="+xtabla);
		//$("#xtamaño").puidropdown('selectValue', "Mediano");
		//$("#xtamaños > option[value='Mediano']").attr("selected",true);
	})
}

function Recargar_Lista(){
	$.ajax({
		url : 'buscar_mascotas.php',
		type : 'POST',
		data : "xmascota=" + $('#xmascota').val(),
		})
		.done(function(resultado){
			//alert($('#xmascota').val());
			$('#xraza').html(resultado);
			//$("#xtamaños > option[value='Mediano']").attr("selected",true);		
		})
}









