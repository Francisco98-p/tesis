<!doctype html>
<html>
  <head>
    <title>Buscador en SELECT usando Select2 con PHP MySQL</title>

    <meta charset="UTF-8">
    <!-- jQuery -->
    <script src="../scripts/jquery-3.2.1.js"></script>

    <!-- select2 css -->
    <link href='./assets/select2v410/css/select2.min.css' rel='stylesheet' type='text/css'>

    <!-- select2 script -->
    <script src='./assets/select2v410/js/select2.min.js'></script>
    <!-- Libreria español -->
<script src="./assets/select2v410/js/i18n/es.js"></script>

    <!-- CDN -->
    <!--  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script> 
     -->
  </head>
  <body>

     <select id='BuscarProductos' style='width: 300px;' lang="es">
        <option value='0'>- Buscar producto -</option>
     </select>

<script>
$(document).ready(function(){

   $("#BuscarProductos").select2({
      ajax: {
        url: "extraer_palabras_claves.php",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function (params) {
           return {
              searchTerm: params.term // search term
           };
        },
        processResults: function (response) {
           return {
              results: response
           };
        },
        cache: true
      }
   });
});
</script>
  </body>
</html>