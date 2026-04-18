$sql="SELECT A.Id,A.NroResolucion,A.Fecha_inicio,A.Fecha_final,A.Resumen,A.Objetivo, ";
$sql.="(Select Unidad ";
$sql.="from detalleactividadunidad ";
$sql.="inner join unidadejecutora as B on UnidadEjecutora_Id = B.Id ";
$sql.="where A.Id = Actividad_Id  limit 0,1), ";
$sql.="FROM actividad as A";


    $unidades_leidas= '<ul><li>',$row[6].'</li>';
if $row[7] >'' {
	$unidades_leidas.= '<li>',$row[7].'</li>';
}
if $row[8] >'' {
	$unidades_leidas.= '<li>',$row[8].'</li>';
}
$unidades_leidas.='</ul>';  


 $sql.=" OR ((Select B.Nombre "; //busco LIKE con la primer organizacion
     
	 $sql.="from detalleactividadorganizacion ";
     $sql.="inner join organizacion as B on Organizacion_Id = B.Id ";
     $sql.="where A.Id = Actividad_Id  limit 0,1) LIKE '%".$requestData['search']['value']."%') ";