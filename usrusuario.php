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
$VLdtCamp12=$_GET[txt_Camp12];
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Código";
$VLtxtCampo3="Usuario";
$VLtxtCampo4="Clave";
$VLtxtCampo5="Descripcion";
$VLtxtCampo6="Observacion";
$VLtxtCampo7="Fecha de Creacion";
$VLtxtCampo8="Apellidos";
$VLtxtCampo9="Nombres";
$VLtxtCampo10="Cedula";
$VLQryCampo1="usucodigo";
$VLQryCampo2="percodigo";
$VLQryCampo3="usunombre";
$VLQryCampo4="usupassword";
$VLQryCampo5="usudescripcion";
$VLQryCampo6="usuobservacion";
$VLQryCampo7="usufechacreacion";
$VLQryCampo8="perapellidos";
$VLQryCampo9="pernombres";
$VLQryCampo10="percc";
$VLQryCampo11="perfcodigo";
$VLQryCampo12="perfnombre";
$VLQryCampo13="anocodigo";



$VLQry1=" Select p.percodigo, p.perapellidos, p.pernombres, p.percc, ";
$VLQry1.="u.usucodigo, u.usunombre, u.usupassword from ";
$VLQry1.="psn p, sr u ";
$VLQry1.=" where p.percodigo=u.percodigo and u.usuestado=1 ";
$VLQry2="Select * from prfl ";
$VLQry3=" insert into psn ( perapellidos, pernombres, percc ) values (";
$VLQry4="Select * from psn ";
$VLQry5=" where ";
$VLQry6="insert into sr ( percodigo, usunombre, usupassword,usuestado) values ( ";
$VLQry7= " order by u.usunombre ";
$VLQry8="Select * from sr ";
$VLQry9= "Select * from srprfl ";
$VLQry10= "delete from srprfl where ";
$VLQry11= "insert into srprfl (perfcodigo,usucodigo,anocodigo) values (";
$VLQry12= "update sr set ";
$VLQry13= " AND ";



$VLConexion=connect();
$Query = "Select * from nlctv where anocodigo= ".$VLAnoLocal;
$VLdtDatos = execute_query($Query,$VLConexion);
$VLnuDatos = total_records($VLdtDatos);
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


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head><title>Pantalla de Administracion del Sistema - Usuario	</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);
if($VLnuDatosU>0){
	include("sallitnalp/strctr1srsr.php"); 
} else{
	include("sanigap/strctr1ndx.php"); 	
}

?>
</body>
