var agregarContacto = document.getElementById('btnAgregar');
var formulario = document.getElementById('formularioCrearUsuario');
var action = formulario.getAttribute('action');

agregarContacto.addEventListener('click', function(e) {
  e.preventDefault();
  crearUsuario();
});

function crearUsuario() {
 //alert("funciona");
    var form_datos = new FormData(formulario);
    for([key, value] of form_datos.entries()) {
      console.log(key + ": " + value);
    }
    var xhr = new XMLHttpRequest();
    xhr.open('POST', action, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
            var resultado = xhr.responseText;
            console.log(resultado);
            var json = JSON.parse(resultado);
            if(json.respuesta == true) {
                registroExitoso(json.nombre);
                construirTemplate(json.nombre, json.telefono, json.id);
                var totalActualizado = parseInt(totalRegistros.textContent) + 1;
                totalRegistros.innerHTML = totalActualizado;
            }
        }
    }
    xhr.send(form_datos);

}
