<?php 

require "cnxn_bsddts/mnjdr_bsdts.php";
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
$vlccn=$_GET[vlccn];
$VLAnoLocal=$_GET[nlctv];
$VLInstitucion=$_GET[nsttcn];
$VLUsuario=$_GET[sr];

$VLtxtCampo1="Código";
$VLtxtCampo2="Nombre";
$VLtxtCampo3="F. Inicial (aaaa-mm-dd)";
$VLtxtCampo4="F. Final (aaaa-mm-dd)";
$VLtxtCampo5="Observaciones";
$VLtxtCampo7="Institucion";

$VLQryCampo1="anocodigo";
$VLQryCampo2="anodescripcion";
$VLQryCampo3="anofechainicial";
$VLQryCampo4="anofechafinal";
$VLQryCampo5="anoobservacion";
$VLQryCampo6="anoestado";
$VLQryCampo7="inscodigo";
$VLQry1=" insert into nlctv ( ";
$VLQry1.="anodescripcion,anofechainicial,anofechafinal,";
$VLQry1.="anoobservacion,anoestado,inscodigo,anoinicio )";
$VLQry1.=" values ( ";
$VLQry2="update nlctv set  ";
$VLQry3=" where anocodigo=";
$VLQry4.="delete from nlctv ";
$VLQry5=")";
$VLQry6="Select * from nlctv ";
$VLQry7= " order by anodescripcion ";
$VLQry8="Select * from grp ";
$VLQry9= "where";

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

<head><title>Pantalla de Administracion del Sistema - Año Lectivo</title></head>
<body>
<?php 
$QueryU = "Select *  from srprfl where usucodigo=".$VLUsuario." and anocodigo=".$VLAnoLocal;
$VLdtDatosU = execute_query($QueryU,$VLConexion);
$VLnuDatosU = total_records($VLdtDatosU);

if($VLnuDatosU>0){
	$VLdtPerUsusario=get_result($VLdtDatosU,0,"perfcodigo");
	include("sallitnalp/strctr1nlctv.php");  
} else{
	include("sanigap/strctr1ndx.php"); 	
}
?>
</body>
