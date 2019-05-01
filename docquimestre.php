<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
header('Content-Type: text/html; charset=UTF-8');
$VLNuevo=$_GET[nuevo_x];
$VLGuardar=$_GET[guardar_x];
$VLModificar=$_GET[modificar_x];
$VLBuscar=$_GET[buscar_x];
$VLImprimir=$_GET[imprimir_x];
$VLEliminar=$_GET[eliminar_x];
$VLConsultar=$_GET[consultar_x];
$VLdtCriterio=$_GET[critero];
$VLdtConsultar=$_GET[txt_Consulta];
$VLdtCamp1=$_GET[txt_Camp1];
$VLdtCamp2=$_GET[txt_Camp2];
$VLdtCamp3=$_GET[txt_Camp3];
$VLdtCamp4=$_GET[txt_Camp4];
$VLdtCamp5=$_GET[txt_Camp5];
$VLdtCamp6=$_GET[txt_Camp6];
$VLdtCamp7=$_GET[txt_Camp7];
$VLdtCamp8=$_GET[txt_Camp8];
$VLdtCamp9=$_GET[txt_Camp9];
$VLdtCamp10=$_GET[txt_Camp10];
$VLdtCamp11=$_GET[txt_Camp11];
$VtFamilia=$_GET[txt_familia];
$VLdtCamp12=$_GET[txt_Camp12];
$VLdtCamp14=$_GET[txt_Camp14];

$VTdtDtqmcodigo=$_GET[txt_Dtqmcodigo];
$VTdtPromParcial=$_GET[txt_PromParc];
$VTdtEquiv80=$_GET[txt_Equi80];
$VTdtExamen=$_GET[txt_Exam];
$VTdtEquiv20=$_GET[txt_Equi20];
$VTdtPromQuim=$_GET[txt_ProQui];
$VLdtmattipo=$_GET[txt_dtmattipo];
$VLdtfamilia=$_GET[txt_dtfamilia];
$VtTipoq=$_GET[txt_tipoq];

$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Quimestre";
$VLtxtCampo2="Parcial";
$VLtxtCampo3="Materia";
$VLtxtCampo4="Curso";
$VLtxtCampo5="Estado";
$VLtxtCampo6="Sigla";
$VLQryCampo1="curcodigo";
$VLQryCampo2="curdescripcion";
$VLQryCampo3="curorden";
$VLQryCampo4="curobservacion";
$VLQryCampo5="curestado";
$VLQryCampo6="cursigla";
$VLQry1=" insert into crs ( ";
$VLQry1.="curdescripcion,curorden,";
$VLQry1.="curobservacion,cursigla,curestado) ";
$VLQry1.=" values ( ";
$VLQry2="update crs set  ";
$VLQry3=" where curcodigo=";
$VLQry4.="delete from crs ";
$VLQry5=")";
$VLQry6="Select * from crs ";
$VLQry7= " order by curorden ";
$VLQry8="Select * from grp ";
$VLQry9= "where";

$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);

$QueryD="Select u.usucodigo, u.percodigo, d.indocodigo, p.perapellidos, p.pernombres, p.percc ";
$QueryD.="from sr u, nsttcndcnt d, psn p ";
$QueryD.="where u.percodigo=d.percodigo and p.percodigo=u.percodigo and u.usucodigo=".$VLUsuario;
$VLdtDatosD = execute_query($QueryD,$VLConexion);
$VLnuDatosD = total_records($VLdtDatosD);

if ( $VLnuDatosD>0 )
{
				$VLdtCamp1=get_result($VLdtDatosD,0,"u.percodigo");
				$VLdtCamp2=get_result($VLdtDatosD,0,"d.indocodigo");
}

if ( $VLnuDatos>0 )
{
				$VLdtPeriodo=get_result($VLdtDatos,0,"anodescripcion");
}

if ( $VLNuevo != "")
{
	$vlccn="nuevo";
} 
if ( $VLGuardar != "")
{
	$vlccn="guardar";
} 
if ( $VLModificar != "")
{
	$vlccn="modificar";
} 
if ( $VLBuscar != "")
{
	$vlccn="buscar";
} 
if ( $VLImprimir != "")
{
	$vlccn="imprimir";
} 
if ( $VLEliminar != "")
{
	$vlccn="eliminar";
} 


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


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<head><title>Pantalla de Administracion del Sistema - Ingreso de Notas</title></head>
<body>


<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
include("sallitnalp/strctr1dctqmstr.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}

?>
</body>
