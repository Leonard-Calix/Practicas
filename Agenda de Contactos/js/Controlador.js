var comentarios = [
	{"codigo" : 1 , "nombre" : "Leonard Calix", "comentario" : "Es rica el agua"},
	{"codigo" : 2 , "nombre" : "Cathy Valdez", "comentario" : "No mame, muy helada"},
	{"codigo" : 1 , "nombre" : "Leonard Calix", "comentario" : "jajjajaja barbara"},
	{"codigo" : 2 , "nombre" : "Cathy Valdez", "comentario" : "Neta, me muero"},
	{"codigo" : 1 , "nombre" : "Cathy Valdez", "comentario" : "Neta"}

	];

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

for (var i = 0; i < comentarios.length; i++) {

	$("#div-comentarios").append(`
          				<div class="row">
							<div class="col-md-1 col-1 mr-1">
								<span><img class="rounded-circle foto-perfil mr-2" src="img/${comentarios[i].codigo}.jpg"></span>
							</div>
							<div class="col-md-10  col-10">
								<div class="p-2 mb-2 color-comentario" >
									<small class="text-muted">
										<span class="text-primary"><b>${comentarios[i].nombre}</b></span> 
										${comentarios[i].comentario}
									</small>			
								</div>
							</div>
						</div>`);
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
			if (respuesta.codigo == 1) {
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



$("#btn-comentar").click(function () {

	var usuario = "Cathy Valdes";
	var comentario = $("#comentario").val();

	if (comentario!="") {
		$("#div-comentarios").append(`
          				<div class="row">
							<div class="col-md-1 col-1 mr-1">
								<span><img class="rounded-circle foto-perfil mr-2" src="img/p-2.jpg"></span>
							</div>
							<div class="col-md-10  col-10">
								<div class="p-2 mb-2 color-comentario" >
									<small class="text-muted">
										<span class="text-primary"><b>${usuario}</b></span> 
										${comentario}
									</small>			
								</div>
							</div>
						</div>`);
	}else{
		alert("Vacio");
	}
	
	

});