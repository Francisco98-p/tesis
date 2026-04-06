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
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>
                   
                   
                </div>
            </div>
            
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id']);
			$sql = mysqli_query($conn, "SELECT * FROM persona WHERE id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			?>
          
            <blockquote>
			
            Actualizar datos de la Persona 
            </blockquote>
			
			  <form name="form1" id="form1" class="form-horizontal row-fluid"  action="update-edit_persona.php"  method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">Registro</label>
											<div class="controls">
												<input type="text" name="id" id="id" value="<?php echo $id ?>" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>										
										<div class="control-group">
											<label class="control-label" for="nombre">Apellido y Nombres</label>
											<div class="controls">
												<input name="nombre" id="nombre" class=" form-control span8 tip"   
												value="<?php echo $row['Nombre']; ?>"type="text" placeholder="Persona" required />
											</div>
										</div> 
									  <div class="control-group">
											<label class="control-label" for="titulo">Título</label>
											<div class="controls">
												<input name="titulo" id="titulo" class=" form-control span8 tip"   
												value="<?php echo $row['Titulo']; ?>"type="text" placeholder="Indique el título que figura en la resolución" required />
											</div>
										</div> 
									  
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="update"  id="input" 
												class="btn btn-sm btn-primary">Actualizar</button>
                                               <a href="alta_persona.php" class="btn btn-sm btn-danger">Cancelar</a>
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
      
1    </body>
