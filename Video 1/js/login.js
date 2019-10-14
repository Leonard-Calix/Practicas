
var funcionLogin = function login() {
	console.log("hola desde la funcion");

	var datos = {
		correo : $("#correo").val(),
		contrasenia : $("#contrasenia").val()
	}

	console.log(datos);


	$.ajax({
		url:"ajax/gestion-Usuario.php?accion=login2",
		method:'POST',
		data: datos,
		dataType:'json',
		success:function(res){
			console.log(res)

			if (res.resultado==0) {
				$("#alert-bien").fadeOut(500);
				$("#alert-mal").fadeIn(500);
			}


			if (res.resultado==1) {
				$("#alert-mal").fadeOut(500);
				$("#alert-bien").fadeIn(500);

			}

		}

	});


}


$("#btn-login").click(funcionLogin);