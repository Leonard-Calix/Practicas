//alert("listo");


$("#btn-login").click(function(event) {

	console.log("btn-login");

	//obtener los valores de un input
	var correo = $("#correo").val();
	var contrasenia = $("#contrasenia").val();

	//console.log(contrasenia + " " + correo);

	var param = { pcorreo : correo, pcontrasenia: contrasenia };

	//console.log(param);

	$.ajax({
		url:'ajax/gestion-cliente.php?accion=login',
		method:'POST', // forma de envio
		dataType:'json', // datos de retorno
		data: param , // lo que se envia al servidor
		success:function(res){
			console.log(res);

			if (res.res==1) {
				console.log("Valido");
				location.href="http://www.cristalab.com/foros";

			}else{
				console.log("Invalido");  

			}

/*
			$("#res-usuario").append(` 
				<div class="col-lg-6 col-md-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">${res.Usuario}</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<button onclick="detalles(${res.id});" class="btn btn-primary">Go somewhere</button>
						</div>
					</div>
				</div> `);
				*/
		}
	});

});

function detalles(id) {
	console.log(id);

}








function login() {

	console.log("Funcion login");

	//obtener los valores de un input
	var correo = $("#correo").val();
	var contrasenia = $("#contrasenia").val();

	console.log(contrasenia + " " + correo);
}

