

$(document).ready(function(){

	$.ajax({
		url:"ajax/usuario.php?accion=mostrar",
		dataType:"json",
		success:function (respuesta) {
			console.log(respuesta);

			for (var i = 0; i < respuesta.length; i++) {
				$("#res").append(
					`<div class="alert alert-primary" role="alert">
						<b>Nombre :</b> ${respuesta[i].nombre}<br> <b>Numero :</b> ${respuesta[i].telefono}
					</div>`);
			}
		}
	});


$("#btn-agregar").click(function() {
	
	var parametros = "nombre="+$("#nombre").val()+"&numero="+$("#numero").val();

	console.log(parametros);

	$.ajax({
		url:"ajax/usuario.php?accion=agregar",
		dataType:'json',
		method: 'POST',
		data: parametros,
		success:function(respuesta){
			console.log(respuesta);
			if (respuesta.codigo==1) {
				$("#res").append(
				`<div class="alert alert-primary" role="alert">
					<b>Nombre :</b> ${$("#nombre").val() }<br> <b>Numero :</b> ${$("#numero").val()}
				</div>`);
				$("#nombre").val("");
				$("#numero").val("");
			}else{
				alert("No se pudo agreagr");	
			}
		}
	});
});

