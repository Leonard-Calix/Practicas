<!DOCTYPE HTML>
<html>
<head>

  <style type="text/css">

    .input{
      pado
    }


  </style>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  
</head>
<body>
 <form method="post" id="formulario" enctype="multipart/form-data">
  Subir imagen: <input type="file" name="file">
  <input type="hidden" name="usr" value="1">
</form>
<div id="respuesta"></div>






<script>

   $(function(){
    $("input[name='file']").on("change", function(){
      var formData = new FormData($("#formulario")[0]);
      //var ruta = "ajax-imagen.php";
      var ruta = "guardar.php";
      $.ajax({
        url: ruta,
        type: "POST",
        data: formData,
        //datatype: 'json',
        contentType: false,
        processData: false,
        success: function(datos)
        {

          console.log(datos)
        
        $("#respuesta").html(datos);


        }
        });
    });
  });



</script>

</body>
</html>