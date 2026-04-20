<?php include "conn.php"; ?>
<!DOCTYPE html>
<!-- Para llenar un Selct con Mysql
https://www.baulphp.com/llenar-select-html-con-mysql-php-ejemplos/
 -->
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
	  <style type="text/css">
	#campos_adicionales {
	display:none;
    }
    </style>
	
    </head>
    <body>
       <div class="navbar navbar-fixed-top" style="background: linear-gradient(135deg, #1a4b8c, #2c6eb5); border-bottom: none; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div class="navbar-inner" style="background: transparent; border: none; box-shadow: none;">
                <div class="container" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 0;">
                    <a class="brand" href="index.php" style="color: white; font-weight: bold; text-shadow: none; font-size: 20px; float: none; padding: 0;">
                        <i class="icon-university"></i> BCFEXA - Intranet
                    </a>
                    <a href="index.php" class="btn btn-info" style="color: white; padding: 10px 20px; font-weight: bold; border-radius: 5px;">
                        <i class="icon-home" style="margin-right:5px;"></i> Volver al Menú Inicial
                    </a>
                </div>
            </div>
            
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM unidadejecutora WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
          
            <blockquote>
			
            Actualizar datos de la Unidad Ejecutora FCEFN 
            </blockquote>
			
			  <form name="form1" id="form1" class="form-horizontal row-fluid"  action="update-edit_unidad_ejecutora.php"  method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">Registro</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $id ?>" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>										
										<div class="control-group">
											<label class="control-label" for="unidad">Unidad Ejecutora en FCEFN</label>
											<div class="controls">
												<input name="unidad" id="unidad" class=" form-control span8 tip"   
												value="<?php echo $row['Unidad']; ?>"type="text" placeholder="Unidad de la FCEFN" required />
											</div>
										</div> 
									  
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="update"  id="input" 
												class="btn btn-sm btn-primary">Actualizar</button>
                                               <a href="alta_unidad_ejecutora.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
                                    
									</form>
                                                </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href="#"> BCFEXA IdeI</a> &copy; <?php echo date("Y")?> </b></center>
            </div>
        </div>
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
	<!-- Maneja el div para carga de opcionales
		https://tutobasico.com/activar-boton-o-enlace-con-jquery/
		-->
		<script>
          $( "#mostrar_campos_adicionales" ).click( function() {
          $( "#campos_adicionales" ).toggle();
          });
        </script>


<script type="text/javascript">

// Esta función arma el nombre del archivo asociado a la normativa (que ya está en el server).		
    function add()
    {  
			
			tipo = $('input[name="tipo_objeto"]:checked').val();
			tipo= tipo.substr(0,1);
			
			numero= document.getElementById("numero_objeto").value;
			if (numero < 10) {
                numero= '0'.concat(numero);
            }
			
			anio= document.getElementById("anio_objeto").value;
			anio= anio.substr(0,4);
			
			//archivo='deposito/'.concat(tipo).concat(anio).concat('/');
			
			archivo=tipo.concat(numero).concat('-',anio).concat('-CD-FCEFN_OCR.pdf');
			//alert(archivo);
			document.getElementById('archivo').value = archivo;
			// falta verificar que existe en el server ...
			// https://es.acervolima.com/como-verificar-que-el-archivo-mencionado-existe-o-no-usar-javascript-jquery/
			
	}
</script>
      
1    
<!-- Script de advertencia de cambios sin guardar -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let formHasChanged = false;

    // Ignorar campos de búsqueda o datatables genéricos si los hay, enfocarse en inputs del form principal
    const inputs = document.querySelectorAll('form input, form select, form textarea');
    inputs.forEach(input => {
        // Evitaremos los hidden porque a veces los plugins los cambian
        if(input.type !== 'hidden') {
            input.addEventListener('change', () => { formHasChanged = true; });
            input.addEventListener('input', () => { formHasChanged = true; });
        }
    });

    // En selects de select2
    if(typeof jQuery !== 'undefined') {
        jQuery('select').on('select2:select', function (e) {
            formHasChanged = true;
        });
    }

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', () => { formHasChanged = false; });
    });

    const cancelButtons = document.querySelectorAll('a.btn-danger, a.btn-secondary, a[href="index.php"], a[href="alta_persona.php"], a[href="alta_organizacion.php"], a[href="alta_unidad_ejecutora.php"], a[href="alta_tipo_actividad.php"]');
    cancelButtons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (formHasChanged) {
                e.preventDefault();
                const targetUrl = this.getAttribute('href');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'No has guardado los datos. Si sales ahora, perderás todos los cambios realizados.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: '<i class="fas fa-sign-out-alt me-2"></i>Sí, salir sin guardar',
                    cancelButtonText: 'No, quedarme'
                }).then((result) => {
                    if (result.isConfirmed) {
                        formHasChanged = false; // prevenir el beforeunload
                        window.location.href = targetUrl || 'index.php';
                    }
                });
            }
        });
    });

    window.addEventListener('beforeunload', function (e) {
        if (formHasChanged) {
            e.preventDefault();
            e.returnValue = ''; 
        }
    });
});
</script>
</body>
