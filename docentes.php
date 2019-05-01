<?php 
require "cnxn_bsddts/mnjdr_bsdts.php";
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLConexion=connect();



//////////////////// RECUPERAMOS EL CODIGO DEL DOCENTE ////////////
$VTQryDoc= "Select di.indocodigo
from sr u, nsttcndcnt di
where u.usucodigo= ".$VLUsuario."
and u.percodigo=di.percodigo";
$VLdtDatosDc = execute_query($VTQryDoc,$VLConexion);
$VLnuDatosDc = total_records($VLdtDatosDc);
if($VLnuDatosDc>0){
	$VTdtDocCodigo=get_result($VLdtDatosDc,0,"di.indocodigo");				
}


//////////////////// RECUPERAMOS LOS PERMISOS PARA REPORTES DEL USUARIO //////
$VTQryPermisos=" Select p.perfcodigo 
from prfl p, srprfl sp
where sp.usucodigo=".$VLUsuario."
and sp.perfcodigo=p.perfcodigo
and sp.anocodigo=".$VLAnoLocal." 
and p.perfestado=1 ";

$VLdtDatosPe = execute_query($VTQryPermisos,$VLConexion);
$VLnuDatosPe = total_records($VLdtDatosPe);
if($VLnuDatosPe>0){
	$VLPer=0;
	for ( $z=0; $z<$VLnuDatosPe; $z++){
		$VTdtPerfil=get_result($VLdtDatosPe,$z,"p.perfcodigo");
		switch ($VTdtPerfil)
		{
			case 1:
				$VLPer=1;
			break;	
			case 2:
				if ($VLPer!=1){	$VLPer=2; }
			break;	
			case 3:
				if ($VLPer==0 || $VLPer>2) { $VLPer=3; }
			break;	
			case 4:
				if ($VLPer==0 || $VLPer==6){ $VLPer=4; }
			break;	
			case 5:
				if ($VLPer==0 || $VLPer>3) { $VLPer=5; }
			break;	
			case 6:
				if ($VLPer==0 ){ $VLPer=6; }			
			break;	
		}
	
	}
}

//////////////////////////////////////////////////////////////////////////////


$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

?>
<head><title>Pantalla de Docentes</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sanigap/strctr1dcnts.php"); 
 
} else{
	include("sanigap/strctr1ndx.php"); 	
}


?>
</body>
