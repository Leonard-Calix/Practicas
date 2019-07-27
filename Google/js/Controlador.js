$(document).ready(function($) {

	/*CARPETAS*/
	console.log("listo");	
	var parametros = "carpeta="+$("#carpetaActual").val();
	$.ajax({
		url:"ajax/carpeta.php?accion=obtener",
		dataType:'json',
		method:"POST",
		data:parametros,
		success:function(respuesta){
			console.log("carpetas");
			console.log(respuesta);
			for (i = 0; i < respuesta.length ; i++) {

				$("#carpetas").append(
					`<div class="col-md-2 carpeta m-2">
					<a href="index.php?carpeta=${respuesta[i].nombre}"><i class="fas fa-folder tamanio"></i> <span class="nombre">${respuesta[i].nombre}</span> </a>
					</div>`
					);
			}	
			if ( respuesta.length == 0) {
				$("#mensaje").append('<p class="text-center">No hay archivos</p>');
			}
		}
	});

	/*ARCHIVOS*/

	console.log("Archivos por carpetas");	
	var carpeta = "carpeta="+$("#carpetaActual").val();
	$.ajax({
		url:"ajax/archivo.php?accion=obtener",
		dataType:'json',
		method:"POST",
		data:carpeta,
		success:function(respuesta){
			console.log("archivos");
			console.log(respuesta);
			
		}
	});

});


$("#btn-crear").click(function() {

	var parametros = "nombre="+$("#nombreC").val()+"&carpeta="+$("#carpetaActual").val();

	console.log(parametros);

	$.ajax({
		url:"ajax/carpeta.php?accion=agregar",
		dataType:'json',
		method:"POST",
		data:parametros,
		success:function(respuesta){
			//console.log("ajax");
			console.log(respuesta);
			if (respuesta.estado==1) {
				$("#mensaje").hide();
				$("#carpetas").append(
					`<div class="col-md-2 carpeta m-2">
					<a href="index.php?carpeta=${$("#nombreC").val()}"><i class="fas fa-folder tamanio"></i> <span class="nombre">${$("#nombreC").val()}</span> </a>
					</div>`
					);

			}	
		}
	});
});

