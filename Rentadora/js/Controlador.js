$(function () {
	'use strict'

	$('[data-toggle="offcanvas"]').on('click', function () {
		$('.offcanvas-collapse').toggleClass('open')
	})
})

//============================================================

$("#error").hide();


$("#btn-login").click(function() {
	

	var respuesta = confirm("Esta seguro")
	
	console.log(respuesta);


	var usuario = $("#inputUsuario").val();
	var contrasenia = $("#inputContrasenia").val();
	var error = $("#error");

	if (usuario=="" || contrasenia=="") {
		error.show();
	}else{
		$("#error").hide();
		console.log(usuario + " " + contrasenia);
	}


});

//============================================================

$("#btn-nuevo").click(function() {
	
	console.log($("#fecha").val() + " " + $("#marca").val());
	


});