function seleccionarUsuario(codigoUsuario, nombreUsuario){
	  $("#seccionPublicaciones").html("");
      document.getElementById("txt-id-usuario").setAttribute("value", codigoUsuario);
      document.getElementById("txt-nombre").setAttribute("value", nombreUsuario);
      var parametros ="codigoUsuario="+codigoUsuario;
    
    $.ajax({
		url:"ajax/obtener-publicaciones.php",
		data: parametros,
		method:'GET',
		dataType:'json',
		success:function(respuesta){
			var imprimir ="";
			console.log(respuesta);
			for (var i=0; i<respuesta.length ; i++){
      imprimir+= '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 card-container">'+
				 '<div class="card-profile">'+
				 '<span class="profile-name">'+respuesta[i].titulo_publicacion+'</span>'+
				 '<small>'+respuesta[i].fecha_publicacion+'</small>'+
				' <p>'+respuesta[i].texto_publicacion+'</small>'+
				 '<h5>Comentarios</h5>';
               for (var j=0; j<respuesta[i].comentarios.length; j++){
                     
			imprimir+= 	 '<div class="card-comment">'+
				'<img class="img-circle img-comment" src="'+respuesta[i].comentarios[j].url_imagen_perfil+'">'+
				'<span class="profile-name">'+respuesta[i].comentarios[j].nombre_usuario+'</span>'+
				'<p class="comment">'+respuesta[i].comentarios[j].comentario+'</p>'+
				'</div>';
					}
			imprimir+= 	 '</div>'+
				'</div><br>';
				 $("#seccionPublicaciones").append(imprimir);
			      }
			}

		});

	
}

function agregarAmigo(codigoNuevoAmigo){
	alert("Codigo nuevo amigo: " + codigoNuevoAmigo);
}
$(document).ready(function(){
    $.ajax({
		url:"ajax/obtener-usuarios.php",
		dataType:'json',
		success:function(respuesta){
			
			for (var i=0; i<respuesta.length ; i++){
				$("#cargarTarjetas").append(
					'<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">'+
					' <div class="card-profile">'+
					 '<button type="button" class="btn btn-primary btn-xs" style="position:absolute;"'+
					 'title="'+respuesta[i].nombre_usuario+'" onclick="seleccionarUsuario('+respuesta[i].codigo_usuario+ ','+'\''+respuesta[i].nombre_usuario+'\''+' );">'+
					 '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>'+

					 '</button>'+
					 '<img src="'+respuesta[i].url_imagen_perfil+' " class="img-responsive">'+
					 '<span class="profile-name">'+respuesta[i].nombre_usuario+'</span>'+
					 '</div>'+
					 '</div>');
                	
			      }
			}

		});

$("#publicar").click(function(){
     var parametros='txt-publicacion='+ $("#txt-publicacion").val()+'&'
     			 +'txt-titulo-publicacion='+ $("#txt-titulo-publicacion").val()+'&'
                 +'codigoUsuarioComento='+document.getElementById("txt-id-usuario").getAttribute("value");
                 alert(parametros);
       $.ajax({
	       	url:"ajax/guardar-cometarios.php",
	       	method:'GET',
	       	data:parametros,
			success:function(respuesta){
				console.log(respuesta)
			}

       });
 	}
 );



	$("#btn-tengo-hambre").click(function(e){
		e.preventDefault();
		alert("Puede tomar 5 minutos e ir donde don Tito a comprar algo, me trae.");
	});	
	$("#btn-ir-banio").click(function(e){
		e.preventDefault();
		alert("Vaya, solamente deje su telefono en el escritorio.");
	});	
	
});


function buscarUsuario(){
	var parametros= "email="+$("#email").val()+"&"+
	                 "password="+$("#password").val();
	      
	      $.ajax({
	      	url:"ajax/buscarUsuario.php",
	       	method:'GET',
	       	data:parametros,
			success:function(respuesta){
				console.log(respuesta)
				document.getElementById("respuestaIniciarSesion").setAttribute("value", respuesta);
			}

	      });
}