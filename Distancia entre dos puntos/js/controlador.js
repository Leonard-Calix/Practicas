	

	$("#btn-calcular").click(function(){

    if ($("#punto1x").val()=='' || $("#punto1y").val()=='' || $("#punto2x").val()=='' || $("#punto2y").val()=='' ) {
        alert("Tiene Uno o Varios Campos Vacios");
        return;
    }
      
     var x1 = parseInt( $("#punto1x").val() );
     var y1 = parseInt( $("#punto1y").val() );
     var x2 = parseInt( $("#punto2x").val() );
     var y2 = parseInt( $("#punto2y").val() );

     var diferenciaX = (x2-x1) * (x2-x1);
     var diferenciaY = (y2-y1) * (y2-y1);
     var distancia = Math.sqrt(diferenciaX + diferenciaY);



     $("#resultado").html("<br><br><p>La Distancia Entre Los Puntos</p><br>"+
                          "<p>( "+ x1 +", "+ y1 +" ) y " + "( "+ x2 +", "+ y2 +" ) Es : "+ distancia +"</p><br>");

     

		});

	$("#btn-limpiar").click(function(){
		
			//JS Nativo:  document.getElementById("txt-usuario").value
			//alert("JQuery: " + $("#txt-usuario").val());

			//JS Nativo:  document.getElementById("contenido").innerHTML = document.getElementById("txt-usuario").value +", "+ document.getElementById("txt-password").value;
			//Si se quiere anexar contenido html utilizar la function append() en vez de html()
			//$("#contenido").html("<h1>"+$("#txt-usuario").val() + "," + $("#txt-password").val()+"</h1>");
			
			//JS Nativo: document.getElementById("txt-usuario").classList.add("input-invalido");
			//$("#txt-usuario").addClass("input-invalido"); //Utilizar removeClass para quitar una clase css
     $("#punto1x").val("");
     $("#punto1y").val("");
     $("#punto2x").val("");
     $("#punto2y").val("");
     $("#resultado").html("");
		});