$( document ).ready(cargarDatos());

function cargarDatos() {
	$("#respuesta").html(" ");
	 $.ajax({
		url:"ajax/obtener.php",
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			for (var i = 0 ;i < respuesta.length; i++) {
				$("#respuesta").append(
				`<tr>
      				<td>${respuesta[i].marca}</td>
      				<td>${respuesta[i].filtro}</td>
      				<td>${respuesta[i].color}</td>
      				<td>${respuesta[i].clase}</td>
      				<td>${respuesta[i].mentol}</td>
      				<td>${respuesta[i].precio_venta}</td>
      				<td>${respuesta[i].precio_costo}</td>
      				<td><button onclick="editar(${respuesta[i].idCigarrillos});" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fas fa-edit"></i> Editar</button></td>
      				<td><button onclick="borrar(${respuesta[i].idCigarrillos});" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button></td>
    			</tr>`);

			}
			
		}
	});

}


function editar(indice){

	var parametro = "id="+indice;

	$("#btnGuardar").hide();
	$("#btnActualizar").show();
	//console.log(parametro);

	$.ajax({
		url:"ajax/buscar.php",
		data: parametro,
		metod: 'GET',
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			$("#id").val(respuesta[0].idCigarrillos);
			$("#marca").val(respuesta[0].marca);
			$("#filtro").val(respuesta[0].filtro);
			$("#color").val(respuesta[0].color);
			$("#clase").val(respuesta[0].clase);
			$("#mentol").val(respuesta[0].mentol);
			$("#nicotina").val(respuesta[0].nicotina);
			$("#alquitran").val(respuesta[0].alquitran);
			$("#precio_costo").val(respuesta[0].precio_costo);
			$("#precio_venta").val(respuesta[0].precio_venta);
		}
	});	

}

function borrar(indice){
	var parametro = "id="+indice;
	//console.log(parametro);

	$.ajax({
		url:"ajax/eliminar.php",
		data: parametro,
		metod: 'GET',
		dataType: "json",
		success:function(respuesta){
			console.log(respuesta);
			cargarDatos();
		}
	});	
}

function limpiar() {

		$("#btnActualizar").hide();
		$("#btnGuardar").show();
	
		$("#marca").val(" ");
		$("#filtro").val(" ");
		$("#color").val(" ");
		$("#clase").val(" ");
		$("#mentol").val(" ");
		$("#nicotina").val(" ");
		$("#alquitran").val(" ");
		$("#precio_costo").val(" ");
		$("#precio_venta").val(" ");

}

function guardar() {

	var parametros ="marca="+$("#marca").val()+"&"+"filtro="+$("#filtro").val()+"&"+"color="+$("#color").val()+"&"+
					"clase="+$("#clase").val()+"&"+"mentol="+$("#mentol").val()+"&"+"nicotina="+$("#nicotina").val()+"&"+
					"alquitran="+$("#alquitran").val()+"&"+"precio_costo="+$("#precio_costo").val()+"&"+
					"precio_venta="+$("#precio_venta").val();

	console.log(parametros);

	$.ajax({
		url:"ajax/agregar.php",
		data: parametros,
		metod: 'GET',
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			$("#respuesta").append(
				`<tr>
      				<td>${respuesta[0].marca}</td>
      				<td>${respuesta[0].filtro}</td>
      				<td>${respuesta[0].color}</td>
      				<td>${respuesta[0].clase}</td>
      				<td>${respuesta[0].mentol}</td>
      				<td>${respuesta[0].precio_venta}</td>
      				<td>${respuesta[0].precio_costo}</td>
      				<td><button onclick="editar(${respuesta[0].idCigarrillos});" type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg"> <i class="fas fa-edit"></i> Editar</button></td>
      				<td><button onclick="borrar(${respuesta[0].idCigarrillos});" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</button></td>
    			</tr>`);
		}
	});
}

function actualizar() {

	var parametros ="id="+$("#id").val()+"&"+"marca="+$("#marca").val()+"&"+"filtro="+$("#filtro").val()+"&"+"color="+$("#color").val()+"&"+
					"clase="+$("#clase").val()+"&"+"mentol="+$("#mentol").val()+"&"+"nicotina="+$("#nicotina").val()+"&"+
					"alquitran="+$("#alquitran").val()+"&"+"precio_costo="+$("#precio_costo").val()+"&"+
					"precio_venta="+$("#precio_venta").val();

	console.log(parametros);
	$.ajax({
		url:"ajax/editar.php",
		data: parametros,
		metod: 'GET',
		dataType:"json",
		success:function(respuesta){
			cargarDatos();
			console.log(respuesta);
		}
	});
}

//consultas

function consulta2(){
	$("#respuestaConsulta").html(
		`<div class="row">
    		<div class="col-md-6"><b>Monto<b></div>
		</div>`);

	$.ajax({
		url:"ajax/consulta_2.php",
		dataType: 'json',
		success:function(respuesta){
			$("#respuestaConsulta").append(
				`<div class="row">
    				<div class="col-md-6">${ respuesta.monto }</div>
				</div>`);		
		}
	});
}

function consulta1(){
	$.ajax({
		url:"ajax/consulta_1.php",
		dataType: 'json',
		success:function(respuesta){
			console.log(respuesta);
			$("#respuestaConsulta").html(
					`<div class="row">
    					<div class="col-md-6"><b>Marca<b></div>
    					<div class="col-md-6"><b>Pais<b></div>
					</div>`);
			for (var i = 0 ; i < respuesta.length ; i++) {
				$("#respuestaConsulta").append(
					`<div class="row">
    					<div class="col-md-6">${ respuesta[i].marca }</div>
    					<div class="col-md-6">${ respuesta[i].pais } </div>
					</div>`);
			}
					
		}
	});
}

function consulta3(){
	$("#respuestaConsulta").html(
		`<div class="row">
    		<div class="col-md-6"><b>Marca<b></div>
    		<div class="col-md-6"><b>Monto<b></div>
		</div>`);

	$.ajax({
		url:"ajax/consulta_3.php",
		dataType: 'json',
		success:function(respuesta){
			console.log(respuesta);
			$("#respuestaConsulta").append(
				`<div class="row">
    				<div class="col-md-6">${ respuesta.marca }</div>
    				<div class="col-md-6">${ respuesta.venta }</div>
				</div>`);
		}
	});
}

function consulta5(){
	$("#respuestaConsulta").html(
		`<div class="row">
    		<div class="col-md-6"><b>Ingresos<b></div>
		</div>`);

	$.ajax({
		url:"ajax/consulta_5.php",
		dataType: 'json',
		success:function(respuesta){
			$("#respuestaConsulta").append(
				`<div class="row">
    				<div class="col-md-6">${ respuesta.ingresos}</div>
				</div>`);		
		}
	});
}

function consulta4(){
	$("#respuestaConsulta").html(
		`<div class="row">
    		<div class="col-md-6"><b>Marca<b></div>
    		<div class="col-md-6"><b>Monto<b></div>
		</div>`);

	$.ajax({
		url:"ajax/consulta_4.php",
		dataType: 'json',
		success:function(respuesta){
			console.log(respuesta);
			$("#respuestaConsulta").append(
				`<div class="row">
    				<div class="col-md-6">${ respuesta.marca }</div>
    				<div class="col-md-6">${ respuesta.monto }</div>
				</div>`);
		}
	});
}

function consulta9(){
	$("#respuestaConsulta").html(
		`<div class="row">
    		<div class="col-md-6"><b>ID<b></div>
    		<div class="col-md-6"><b>Nombre_Estanco<b></div>
		</div>`);

	$.ajax({
		url:"ajax/consulta_9.php",
		dataType: 'json',
		success:function(respuesta){
			console.log(respuesta);
			$("#respuestaConsulta").append(
				`<div class="row">
    				<div class="col-md-6">${ respuesta.id }</div>
    				<div class="col-md-6">${ respuesta.estanco }</div>
				</div>`);
		}
	});
}
