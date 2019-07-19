
$(document).ready(function() {

	$.ajax({
		url:'Consulta.php',
		datatype:'json',
		sucess:function(respuesta){
			console.log(respuesta);
		}
	});



console.log("listo")
});


